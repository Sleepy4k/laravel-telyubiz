<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductOption>
 */
class ProductOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::pluck('id')->toArray();

        return [
            'id' => fake()->unique()->uuid(),
            'product_id' => fake()->randomElement($products),
            'title' => fake()->word(),
            'values' => json_encode([
                'name' => fake()->word(),
                'values' => [
                    fake()->word(),
                    fake()->word(),
                    fake()->word(),
                ],
            ]),
        ];
    }
}
