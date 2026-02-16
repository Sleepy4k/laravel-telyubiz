<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetting>
 */
class UserSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'                       => Str::uuid(),
            'theme'                    => fake()->randomElement(['light', 'dark']),
            'notification_preferences' => json_encode([
                'email' => fake()->boolean(80),
                'push'  => fake()->boolean(70),
            ]),
        ];
    }
}
