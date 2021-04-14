<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

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

        return view('components.product-create', ['colors' => $colors, 'language' => app()->getLocale()]);
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
            ]
        );

        if ($request->hasFile('image')) {
            $request->file('image')->store('images', 'public');
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

        return redirect()->route('dashboard', app()->getLocale());
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Request  $request
     *
     */
    public function edit(Request $request, Product $product, $language)
    {
        $productId = $request->product;
        $editableFields = $this->productRepository->editFields($productId);

        return view(
            'components.product-edit',
            [
                'product' => $editableFields['product'],
                'colors' => $editableFields['colors'],
                'price' => $editableFields['price'],
                'quantity' => $editableFields['quantity'],
                app()->getLocale(),
            ]
        );
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

        return redirect()->route('dashboard', app()->getLocale());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy($language, Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard', $language);
    }
    /**
     * Return product list.
     *
     */
    public function productList()
    {

        return $this->productRepository->productList();
    }
    /**
     * Return colors types.
     *
     */
    public function productColores()
    {
        return $this->productRepository->productColores();
    }

    /**
     * return product types
     * @return \Illuminate\Support\Collection
     */
    public function productTypes()
    {
        return $this->productRepository->productTypes();
    }

}
