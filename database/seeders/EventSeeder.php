<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (Event::query()->withoutCache()->count() > 0) {
            return;
        }

        Event::factory()->count(10)->create();
    }
}
