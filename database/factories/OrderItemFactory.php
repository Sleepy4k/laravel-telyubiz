<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::query()->pluck('id')->toArray();

        return [
            'id' => Str::uuid(),
            'product_id' => fake()->randomElement($products),
            'quantity' => fake()->numberBetween(1, 5),
            'unit_price' => fake()->randomFloat(2, 10000, 100000),
        ];
    }
}
