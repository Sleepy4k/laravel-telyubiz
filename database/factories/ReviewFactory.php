<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('id')->toArray();
        $products = Product::query()->pluck('id')->toArray();
        $orders = Order::query()->pluck('id')->toArray();

        return [
            'id' => Str::uuid(),
            'user_id' => fake()->randomElement($users),
            'product_id' => fake()->randomElement($products),
            'order_id' => fake()->randomElement($orders),
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->text(200),
            'images' => [
                fake()->imageUrl(400, 400, 'reviews', true),
                fake()->imageUrl(400, 400, 'reviews', true),
                fake()->imageUrl(400, 400, 'reviews', true),
            ],
            'is_visible' => fake()->boolean(80),
        ];
    }
}
