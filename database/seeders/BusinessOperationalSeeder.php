<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\BusinessOperational;
use Illuminate\Database\Seeder;

class BusinessOperationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (BusinessOperational::query()->withoutCache()->count() > 0) {
            return;
        }

        $businesses = Business::query()->withoutCache()->select('id')->get();

        $profiles = [
            ['08:00', '17:00', '09:00', '14:00'],
            ['11:00', '22:00', '10:00', '23:00'],
            ['07:00', '20:00', '08:00', '21:00'],
            ['10:00', '21:00', '10:00', '22:00'],
            ['17:00', '02:00', '17:00', '03:00'],
            ['05:00', '18:00', '06:00', '16:00'],
            ['05:00', '23:00', '07:00', '21:00'],
        ];

        foreach ($businesses as $business) {
            $profile = fake()->randomElement($profiles);

            BusinessOperational::factory()
                ->weekday($profile[0], $profile[1])
                ->create(['business_id' => $business->id]);

            BusinessOperational::factory()
                ->weekend($profile[2], $profile[3])
                ->create(['business_id' => $business->id]);
        }
    }
}
