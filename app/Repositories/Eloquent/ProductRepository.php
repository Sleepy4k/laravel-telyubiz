<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\IProductRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProductRepository implements IProductRepository
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
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get popular products
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function popularProducts(array $columns = ['*']): ?Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with([
                'details' => function ($query) {
                    $query->select(
                        'product_id', 'images', 'discount_active',
                        'discount_amount', 'discount_type', 'discount_start_date',
                        'discount_end_date'
                    );
                },
                'reviews' => function ($query) {
                    $query->select('product_id', 'order_id', 'rating');
                }
            ])
            ->withCount('orders')
            ->take(8)
            ->get();
    }

    /**
     * Get total number of products
     *
     * @return int
     */
    public function getTotalProducts(): int
    {
        return $this->model
            ->query()
            ->count();
    }
}
