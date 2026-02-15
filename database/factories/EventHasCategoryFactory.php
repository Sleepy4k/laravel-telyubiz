<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventHasCategory>
 */
class EventHasCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $events = Event::pluck('id')->toArray();
        $categories = EventCategory::pluck('id')->toArray();

        return [
            'event_id' => fake()->randomElement($events),
            'category_id' => fake()->randomElement($categories),
        ];
    }
}
