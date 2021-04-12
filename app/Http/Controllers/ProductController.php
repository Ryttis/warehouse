<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('dashboard', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();

        return view('components.product-create', ['colors' => $colors]);
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'ean' => 'required|string|size:8',
                'type' => 'required|string',
                'weight' => 'required|numeric',
                'name' => 'required|string',
                'color' => 'required|string',
                'status' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('product/create')
                ->withErrors($validator->errors())
                ->withInput();
        }



        $product = new Product();
        $product->fill($request->all());
        $product->ean = $request->ean;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->color = $request->color;
        $product->weight = $request->weight;
        $product->active = $request->status;
        $product->image = $request->image;
        $product->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $colors = Color::all();

        return view('components.product-edit', ['product' => $product, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'ean' => 'required|string|size:8',
                'type' => 'required|string',
                'weight' => 'required|numeric',
                'name' => 'required|string',
                'color' => 'required|string',
                'status' => 'required',
            ]
        );

        $product->ean = $request->ean;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->color = $request->color;
        $product->weight = $request->weight;
        $product->active = $request->status;
        $product->image = $request->image;
        $product->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard');
    }
}
