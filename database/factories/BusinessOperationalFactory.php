<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessOperational>
 */
class BusinessOperationalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $businesses = Business::pluck('id')->toArray();

        return [
            'id'          => Str::uuid(),
            'business_id' => fake()->randomElement($businesses),
            'day_of_week' => 'Senin - Jumat',
            'open_time'   => '09:00',
            'close_time'  => '17:00',
        ];
    }

    /**
     * Generate a random realistic operational schedule.
     */
    public function randomSchedule(): static
    {
        $dayRanges = ['Senin - Jumat', 'Sabtu - Minggu', 'Setiap Hari'];
        $operationProfiles = [
            ['08:00', '17:00'],
            ['09:00', '18:00'],
            ['10:00', '21:00'],
            ['11:00', '22:00'],
            ['07:00', '20:00'],
            ['06:00', '23:00'],
            ['00:00', '23:59'],
            ['17:00', '02:00'],
            ['05:00', '18:00'],
            ['05:00', '23:00'],
        ];

        $dayRange = fake()->randomElement($dayRanges);
        $times = fake()->randomElement($operationProfiles);
        $isClosed = fake()->boolean(5);

        return $this->state(fn(array $attributes) => [
            'day_of_week' => $dayRange,
            'open_time'   => $isClosed ? null : $times[0],
            'close_time'  => $isClosed ? null : $times[1],
        ]);
    }

    /**
     * Set weekday schedule.
     */
    public function weekday(string $openTime = '09:00', string $closeTime = '17:00'): static
    {
        return $this->state(fn(array $attributes) => [
            'day_of_week' => 'Senin - Jumat',
            'open_time'   => $openTime,
            'close_time'  => $closeTime,
        ]);
    }

    /**
     * Set weekend schedule.
     */
    public function weekend(string $openTime = '10:00', string $closeTime = '15:00'): static
    {
        return $this->state(fn(array $attributes) => [
            'day_of_week' => 'Sabtu - Minggu',
            'open_time'   => $openTime,
            'close_time'  => $closeTime,
        ]);
    }

    /**
     * Set everyday schedule.
     */
    public function everyday(string $openTime = '00:00', string $closeTime = '23:59'): static
    {
        return $this->state(fn(array $attributes) => [
            'day_of_week' => 'Setiap Hari',
            'open_time'   => $openTime,
            'close_time'  => $closeTime,
        ]);
    }

    /**
     * Mark as closed.
     */
    public function closed(): static
    {
        return $this->state(fn(array $attributes) => [
            'open_time'  => null,
            'close_time' => null,
        ]);
    }
}
