<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'ean' => $this->faker->ean8(),
            'type' => $this->faker->slug('1'),
            'weight' => $this->faker->randomNumber(3,2),
            'color' => $this->faker->colorName,
            'active' => $this->faker->boolean,
            'created_at' => $this->faker->dateTimeBetween('-2 years','-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('yesterday', 'today')
        ];
    }
}
