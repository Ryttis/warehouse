<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Quantity;
use Illuminate\Database\Seeder;
use App\Models\Product;



class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(10)
            ->has(Price::factory()->count(50))
            ->has(Quantity::factory()->count(50))
            ->create();
    }
}
