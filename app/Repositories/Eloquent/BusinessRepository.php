<?php

namespace App\Repositories\Eloquent;

use App\Models\Business;
use App\Repositories\Contracts\IBusinessRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BusinessRepository implements IBusinessRepository
{
    /** Weights for recommendation score calculation */
    private const array RATING_WEIGHTS = [
        'rating'              => 14,
        'orders'              => 0.3,
        'min_reviews_penalty' => 0.5,
    ];

    /** Store model instance */
    protected Model $model;

    /**
     * Base respository constructor.
     *
     * @param Model $model
     */
    public function __construct(Business $model)
    {
        $this->model = $model;
    }

    /**
     * Get recommended shops using weighted score algorithm.
     */
    public function recommendedShops(array $columns = ['*']): ?Collection
    {
        $businesses = $this->model
            ->query()
            ->select($columns)
            ->where('status', 'active')
            ->with(['category:id,name'])
            ->withCount(['orders', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->get();

        return $businesses
            ->map(static function($business) {
                $ordersCount = $business->orders_count ?? 0;
                $avgRating = $business->reviews_avg_rating ?? 0;
                $reviewsCount = $business->reviews_count ?? 0;

                $baseScore = ($ordersCount * self::RATING_WEIGHTS['orders']) + ($avgRating * self::RATING_WEIGHTS['rating']);
                $penalty = $reviewsCount === 0 ? self::RATING_WEIGHTS['min_reviews_penalty'] : 1;
                $business->recommendation_score = $baseScore * $penalty;

                return $business;
            })
            ->sortByDesc('recommendation_score')
            ->take(8)
            ->values();
    }

    /**
     * Get total number of shops.
     */
    public function getTotalShops(bool $activeOnly = false): int
    {
        return $this->model
            ->query()
            ->when($activeOnly, static fn($q) => $q->where('status', 'active'))
            ->count();
    }

    /**
     * Get list of shops with optional filters.
     */
    public function getShopList(array $filters = [], array $columns = ['*'], array $searchFields = []): Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('status', 'active')
            ->withCount([
                'orders',
                'reviews',
            ])
            ->withAvg('reviews', 'rating')
            ->with(['category:id,name'])
            ->when(isset($filters['category_id']), static fn($q) => $q->where('category_id', $filters['category_id']))
            ->when(isset($filters['search']), static function($q) use ($filters, $searchFields) {
                if (empty($searchFields)) {
                    return $q->where('name', 'like', '%' . $filters['search'] . '%');
                }

                return $q->where(static function($query) use ($filters, $searchFields): void {
                    foreach ($searchFields as $field) {
                        $query->orWhere($field, 'like', '%' . $filters['search'] . '%');
                    }
                });
            })
            ->when(isset($filters['sort']), static function($q) use ($filters) {
                switch ($filters['sort']) {
                    case 'most_popular':
                        return $q->orderByDesc('orders_count');

                    case 'highest_rated':
                        return $q->orderByDesc('reviews_avg_rating');

                    case 'newest':
                        return $q->orderByDesc('created_at');

                    case 'oldest':
                        return $q->orderBy('created_at');

                    case 'a_z':
                        return $q->orderBy('name');

                    case 'z_a':
                        return $q->orderByDesc('name');

                    default:
                        return $q;
                }
            })
            ->get();
    }

    /**
     * Get details of a shop by slug.
     */
    public function getShopDetails(string $slug, array $columns = ['*']): ?Business
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('slug', $slug)
            ->with([
                'owner:id,name,email',
                'owner.details:id,user_id,profile_picture_url',
                'category:id,name',
                'operationalHours:id,business_id,day_of_week,open_time,close_time',
            ])
            ->withCount([
                'reviews',
                'products',
            ])
            ->withAvg('reviews', 'rating')
            ->first();
    }
}
