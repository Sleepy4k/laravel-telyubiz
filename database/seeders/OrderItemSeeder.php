<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (OrderItem::query()->withoutCache()->count() > 0) {
            return;
        }

        $orders = Order::query()->withoutCache()->select('id')->get();
        $items = OrderItem::factory()->count($orders->count())->make();

        $itemsWithOrderId = $items->map(function (OrderItem $item, int $index) use ($orders) {
            $item->order_id = $orders->get($index % $orders->count())->id;

            return $item;
        });

        OrderItem::query()->insert($itemsWithOrderId->toArray());
    }
}
