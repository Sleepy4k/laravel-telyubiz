<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (ProductDetail::query()->withoutCache()->count() > 0) {
            return;
        }

        $products = Product::query()->withoutCache()->select('id')->get();
        $details = ProductDetail::factory()->count($products->count())->make();

        $details->map(function (ProductDetail $detail, int $index) use ($products) {
            $detail->product_id = $products[$index]->id;
            $detail->save();
        });
    }
}
