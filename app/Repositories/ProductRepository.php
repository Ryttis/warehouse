<?php


namespace App\Repositories;


use App\Models\Color;
use App\Models\Price;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Type;

class ProductRepository
{
    public function editFields($productId)
    {
        $colors = Color::all();
        $product = Product::withoutTrashed()->find($productId);
        $price = Price::all()->where('product_id', '=', $productId)->last();
        $quantity = Quantity::all()->where('product_id', '=', $productId)->last();

        return
            [
                'colors' => $colors,
                'product' => $product,
                'price' => $price,
                'quantity' => $quantity,
            ];
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function productList()
    {
        return Product::all();
    }

    /**
     * @return Color[]|\Illuminate\Database\Eloquent\Collection
     */
    public function productColores()
    {
        return Color::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function productTypes()
    {
        return Type::all();
    }
}
