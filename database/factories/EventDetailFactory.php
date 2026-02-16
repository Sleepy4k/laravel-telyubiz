<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDetail>
 */
class EventDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isFreeEntry = fake()->boolean();

        return [
            'id' => Str::uuid(),
            'capacity' => fake()->numberBetween(50, 500),
            'free_entry' => $isFreeEntry,
            'ticket_price' => $isFreeEntry ? 0 : fake()->randomFloat(2, 10, 100),
            'additional_info' => fake()->paragraph(),
        ];
    }
}
