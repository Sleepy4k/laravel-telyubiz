<?php

namespace Database\Seeders;

use App\Models\EventHasCategory;
use Illuminate\Database\Seeder;

class EventHasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) return;
        if (EventHasCategory::query()->withoutCache()->count() > 0) return;

        EventHasCategory::factory()->count(50)->create();
    }
}
