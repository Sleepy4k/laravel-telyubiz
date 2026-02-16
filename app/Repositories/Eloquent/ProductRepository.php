<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\IProductRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProductRepository implements IProductRepository
{
    /** Weights for popularity score calculation */
    private const array POPULARITY_WEIGHTS = [
        'orders' => 0.7,
        'rating' => 0.3,
    ];

    /** Store model instance */
    protected Model $model;

    /**
     * Base respository constructor.
     *
     * @param Model $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get popular products.
     */
    public function popularProducts(array $columns = ['*']): ?Collection
    {
        $products = $this->model
            ->query()
            ->select($columns)
            ->with([
                'details:product_id,images,discount_active,discount_amount,discount_type,discount_start_date,discount_end_date',
                'business:id,name',
            ])
            ->withCount('orders')
            ->withAvg('reviews', 'rating')
            ->get();

        return $products
            ->map(static function($product) {
                $ordersCount = $product->orders_count ?? 0;
                $avgRating = $product->reviews_avg_rating ?? 0;

                $product->popularity_score = ($ordersCount * self::POPULARITY_WEIGHTS['orders']) + ($avgRating * self::POPULARITY_WEIGHTS['rating']);

                return $product;
            })
            ->sortByDesc('popularity_score')
            ->take(8)
            ->values();
    }

    /**
     * Get total number of products.
     */
    public function getTotalProducts(): int
    {
        return $this->model
            ->query()
            ->count();
    }

    /**
     * Get popular products by business slug.
     */
    public function popularProductsByBusiness(string $businessSlug, array $columns = ['*']): ?Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->whereHas('business', static function($query) use ($businessSlug): void {
                $query->where('slug', $businessSlug);
            })
            ->with([
                'details:product_id,images,discount_active,discount_amount,discount_type,discount_start_date,discount_end_date',
                'reviews:product_id,order_id,rating',
            ])
            ->withCount('orders')
            ->take(8)
            ->get();
    }
}
