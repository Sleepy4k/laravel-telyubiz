<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) return;
        if (Product::query()->withoutCache()->count() > 0) return;

        Product::factory()->count(10)->create();
    }
}
