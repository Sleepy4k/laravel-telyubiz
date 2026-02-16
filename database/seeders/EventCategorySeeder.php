<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (EventCategory::query()->withoutCache()->count() > 0) {
            return;
        }

        EventCategory::factory()->count(10)->create();
    }
}
