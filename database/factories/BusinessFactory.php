<?php

namespace Database\Factories;

use App\Models\BusinessCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $categories = BusinessCategory::pluck('id')->toArray();
        $name = fake()->company();

        return [
            'owner_id'    => fake()->randomElement($users),
            'category_id' => fake()->randomElement($categories),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'address'     => fake()->address(),
            'phone'       => '628' . fake()->unique()->numerify('##########'),
            'description' => fake()->paragraph(),
            'status'      => fake()->randomElement(['active', 'suspended']),
            'balance'     => fake()->randomFloat(2, 0, 10000),
            'logo_url'    => fake()->imageUrl(400, 400, 'business', true),
            'banner_url'  => fake()->imageUrl(1200, 400, 'business', true),
        ];
    }
}
