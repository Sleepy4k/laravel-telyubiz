<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTimeline>
 */
class EventTimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'          => Str::uuid(),
            'title'       => fake()->sentence(),
            'description' => fake()->paragraph(),
            'start_time'  => fake()->dateTimeBetween('-1 month', '+1 month'),
            'end_time'    => fake()->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
