<?php

namespace Database\Factories;

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
        $isProductDiscounted = fake()->boolean();
        $discountTypes = fake()->randomElement(['percentage', 'fixed']);
        $discountValue = $discountTypes === 'percentage'
            ? fake()->randomFloat(2, 1, 100)
            : fake()->randomFloat(2, 5000, 50000);

        return [
            'id'     => fake()->unique()->uuid(),
            'images' => [
                fake()->imageUrl(400, 400, 'products', true),
                fake()->imageUrl(400, 400, 'products', true),
                fake()->imageUrl(400, 400, 'products', true),
            ],
            'discount_active'     => $isProductDiscounted,
            'discount_amount'     => $isProductDiscounted ? $discountValue : 0.0,
            'discount_type'       => $isProductDiscounted ? $discountTypes : null,
            'discount_start_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'discount_end_date'   => fake()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
