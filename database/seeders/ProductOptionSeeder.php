<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) return;
        if (ProductOption::query()->withoutCache()->count() > 0) return;

        ProductOption::factory()->count(10)->create();
    }
}
