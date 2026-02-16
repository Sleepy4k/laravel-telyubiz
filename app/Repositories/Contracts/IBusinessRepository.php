<?php

namespace App\Repositories\Contracts;

use App\Models\Business;
use Illuminate\Support\Collection;

interface IBusinessRepository
{
    /**
     * Get recommended shops.
     */
    public function recommendedShops(array $columns = ['*']): ?Collection;

    /**
     * Get total number of shops.
     */
    public function getTotalShops(bool $activeOnly = false): int;

    /**
     * Get list of shops with optional filters.
     */
    public function getShopList(array $filters = [], array $columns = ['*'], array $searchFields = []): Collection;

    /**
     * Get details of a shop by slug.
     */
    public function getShopDetails(string $slug, array $columns = ['*']): ?Business;
}
