<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IProductRepository
{
    /**
     * Get popular products.
     */
    public function popularProducts(array $columns = ['*']): ?Collection;

    /**
     * Get total number of products.
     */
    public function getTotalProducts(): int;

    /**
     * Get popular products by business slug.
     */
    public function popularProductsByBusiness(string $businessSlug, array $filter = [], array $columns = ['*']): ?Collection;

    /**
     * Get all product categories from a specific business.
     */
    public function getProductCategoriesByBusiness(string $businessSlug): ?Collection;
}
