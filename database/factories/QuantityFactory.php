<?php

namespace Database\Factories;

use App\Models\Quantity;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuantityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quantity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1,1000),
            'created_at' => $this->faker->dateTimeBetween('-2 years','-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('yesterday', 'today')
        ];
    }
}
