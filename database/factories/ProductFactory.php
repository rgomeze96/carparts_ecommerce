<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'salePrice' => $this->faker->numberBetween($min = 200, $max = 9000),
            'category' => $this->faker->company,
            'brand' => $this->faker->company,
            'warranty' => $this->faker->monthName(),
        ];
    }
}
