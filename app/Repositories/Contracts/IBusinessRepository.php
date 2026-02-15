<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IBusinessRepository
{
    /**
     * Get recommended shops
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function recommendedShops(array $columns = ['*']): ?Collection;

    /**
     * Get total number of shops
     *
     * @param  bool  $activeOnly
     * @return int
     */
    public function getTotalShops(bool $activeOnly = false): int;
}
