<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (BusinessCategory::query()->withoutCache()->count() > 0) {
            return;
        }

        BusinessCategory::factory()->count(10)->create();
    }
}
