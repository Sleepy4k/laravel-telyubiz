<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('id')->toArray();
        $businesses = Business::query()->pluck('id')->toArray();
        $events = Event::query()->pluck('id')->toArray();

        $orderStatus = fake()->randomElement(['pending', 'processing', 'completed', 'cancelled']);

        return [
            'id'           => Str::uuid(),
            'buyer_id'     => fake()->randomElement($users),
            'business_id'  => fake()->randomElement($businesses),
            'event_id'     => fake()->boolean(30) ? fake()->randomElement($events) : null,
            'total_amount' => fake()->randomFloat(2, 10, 500),
            'is_paid'      => $orderStatus !== 'pending',
            'status'       => $orderStatus,
        ];
    }
}
