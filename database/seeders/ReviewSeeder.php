<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (Review::query()->withoutCache()->count() > 0) {
            return;
        }

        $totalOrders = Order::query()->withoutCache()->count();
        Review::factory()->count($totalOrders)->create();
    }
}
