<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $title = fake()->sentence();

        return [
            'created_by' => fake()->randomElement($users),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'location' => fake()->address(),
            'start_time' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'end_time' => fake()->dateTimeBetween('+1 month', '+2 months'),
            'is_open_for_registration' => fake()->boolean(),
            'logo_url' => fake()->imageUrl(400, 400, 'events', true),
            'banner_url' => fake()->imageUrl(1200, 400, 'events', true),
        ];
    }
}
