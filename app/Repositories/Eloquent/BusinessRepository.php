<?php

namespace App\Repositories\Eloquent;

use App\Models\Business;
use App\Repositories\Contracts\IBusinessRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BusinessRepository implements IBusinessRepository
{
    /**
     * Store model instance
     * @var Model
     */
    protected Model $model;

    /**
     * Base respository constructor
     *
     * @param  Model  $model
     */
    public function __construct(Business $model)
    {
        $this->model = $model;
    }

    /**
     * Get recommended shops
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function recommendedShops(array $columns = ['*']): ?Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('status', 'active')
            ->with([
                'products' => function ($query) {
                    $query->select('business_id', 'id');
                },
                'products.reviews' => function ($query) {
                    $query->select('product_id', 'rating');
                },
            ])
            ->withCount('orders')
            ->orderByDesc('orders_count')
            ->take(8)
            ->get();
    }

    /**
     * Get total number of shops
     *
     * @param  bool  $activeOnly
     * @return int
     */
    public function getTotalShops(bool $activeOnly = false): int
    {
        return $this->model
            ->query()
            ->when($activeOnly, function ($q) {
                return $q->where('status', 'active');
            })
            ->count();
    }
}
