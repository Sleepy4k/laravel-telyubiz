<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Contracts\IOrderRepository;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements IOrderRepository
{
    /**
     * Store model instance
     */
    protected Model $model;

    /**
     * Base respository constructor
     *
     * @param  Model  $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Get total number of orders
     */
    public function getTotalOrders(bool $paidOnly = false, ?string $status = null): int
    {
        return $this->model
            ->query()
            ->when($paidOnly, function ($q) {
                return $q->where('is_paid', true);
            })
            ->when(! is_null($status) && is_string($status), function ($q) use ($status) {
                return $q->where('status', $status);
            })
            ->count();
    }
}
