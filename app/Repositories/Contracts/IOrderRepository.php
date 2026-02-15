<?php

namespace App\Repositories\Contracts;

interface IOrderRepository
{
    /**
     * Get total number of orders
     *
     * @param  bool  $paidOnly
     * @param  string|null  $status
     * @return int
     */
    public function getTotalOrders(bool $paidOnly = false, ?string $status = null): int;
}
