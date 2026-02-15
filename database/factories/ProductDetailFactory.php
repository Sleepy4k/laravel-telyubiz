<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::pluck('id')->toArray();
        $isProductDiscounted = fake()->boolean();

        $data = [
            'id' => fake()->unique()->uuid(),
            'product_id' => fake()->unique()->randomElement($products),
        ];

        $discountTypes = fake()->randomElement(['percentage', 'fixed']);

        return array_merge($data, $isProductDiscounted ? [
            'discount_active' => fake()->boolean(),
            'discount_type' => $discountTypes,
            'discount_amount' => $discountTypes === 'percentage'
                ? fake()->randomFloat(2, 1, 100)
                : fake()->randomFloat(2, 5000, 50000),
            'discount_start_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'discount_end_date' => fake()->dateTimeBetween('now', '+1 month'),
        ] : []);
    }
}
