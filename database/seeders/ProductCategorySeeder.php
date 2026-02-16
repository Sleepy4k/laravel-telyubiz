<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (ProductCategory::query()->withoutCache()->count() > 0) {
            return;
        }

        ProductCategory::factory()->count(10)->create();
    }
}
