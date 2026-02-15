<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IProductRepository
{
    /**
     * Get popular products
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function popularProducts(array $columns = ['*']): ?Collection;

    /**
     * Get total number of products
     *
     * @return int
     */
    public function getTotalProducts(): int;
}
