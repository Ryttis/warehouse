<?php


namespace App\Repositories;


use App\Models\Color;
use App\Models\Price;
use App\Models\Product;
use App\Models\Quantity;

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
}
