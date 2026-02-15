<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) return;
        if (ProductDetail::query()->withoutCache()->count() > 0) return;

        ProductDetail::factory()->count(10)->create();
    }
}
