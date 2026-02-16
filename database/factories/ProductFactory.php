<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ProductCategory::pluck('id')->toArray();
        $businesses = Business::pluck('id')->toArray();
        $name = fake()->word();

        return [
            'business_id' => fake()->randomElement($businesses),
            'category_id' => fake()->randomElement($categories),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10000, 1000000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
