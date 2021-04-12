<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2,3,2),
            'created_at' => $this->faker->dateTimeBetween('-2 years','-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('yesterday', 'today')
        ];
    }
}
