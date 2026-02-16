<?php

namespace App\Repositories\Contracts;

interface IOrderRepository
{
    /**
     * Get total number of orders
     */
    public function getTotalOrders(bool $paidOnly = false, ?string $status = null): int;
}
