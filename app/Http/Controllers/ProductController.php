<?php

namespace App\Http\Controllers;

use App\Facades\Advisor;
use App\Models\Product;
use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Quantity;
use Illuminate\Support\Facades\Response;
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
        $products = Product::paginate(8);

        return view('dashboard', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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

        $validator = Validator::make(
            $request->all(),
            [
                'ean' => 'required|string|size:8',
                'type' => 'required|string',
                'weight' => 'required|numeric',
                'name' => 'required|string',
                'color' => 'required|string',
                'status' => 'required',
                'image' => 'required|image'
            ]
        );

        if ($request->hasFile('image')) {
            $request->file('image')->store('images', 'public');
        }


        $product = new Product();
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
    public function test()
    {
        $quant = Quantity::all()->first();
        return  $quant->quantity . ' ' .Carbon::now()->toDateTimeLocalString();;
    }

    public function test1()
    {

        return  Advisor::getTested();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($language, Product $product)
    {
        $colors = Color::all();
        $price = Price::all()->sortByDesc('created_at')->where('product_id', '=', $product->getAttribute('id'))
            ->first();
        $quantity = Quantity::all()->sortByDesc('created_at')->where('product_id', '=', $product->getAttribute('id'))
            ->first();

        return view(
            'components.product-edit',
            [
                'product' => $product,
                'colors' => $colors,
                'price' => $price->price,
                'quantity' => $quantity->quantity,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
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
                'image' => 'required|image',
            ]
        );

        if ($request->hasFile('image')) {
            $request->file('image')->store('images', 'public');
        }

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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        dd($product);
        $product->delete();

        return redirect()->route('dashboard');
    }
}
