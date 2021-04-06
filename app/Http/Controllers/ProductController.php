<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Price;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate('10');
        $prices = Price::paginate('10');

        return view('dashboard', ['products' => $products, 'prices' => $prices]);
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
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'ean' => 'required|string|size:8',
                'type' => 'required|string',
                'weight' => 'required|numeric',
                'name' => 'required|string',
                'color' => 'required|string',
                'status' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'details' => 'required',
            ]
        );

        $product = new Product();
        $product->fill($request->all());
        $product->ean = $request->ean;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->color = $request->color;
        $product->weight = $request->weight;
        $product->active = $request->status;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->details = $request->details;
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
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'details' => 'required',
            ]
        );

        $product->ean = $request->ean;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->color = $request->color;
        $product->weight = $request->weight;
        $product->active = $request->status;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->details = $request->details;
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
