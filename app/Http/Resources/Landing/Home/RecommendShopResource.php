<?php

namespace App\Http\Resources\Landing\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class RecommendShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'description' => Str::limit($this->description, 60),
            'order_count' => $this->orders_count,
            'rating' => $this->calculateAverageRating(),
            'logo_url' => $this->logo_url,
            'banner_url' => $this->banner_url,
        ];
    }

    /**
     * Calculate the average rating across all products and their reviews.
     */
    private function calculateAverageRating(): float
    {
        if (! $this->products || $this->products->isEmpty()) {
            return 0.0;
        }

        $stats = $this->products->reduce(function ($carry, $product) {
            $carry['total_rating'] += $product->reviews->sum('rating');
            $carry['total_reviews'] += $product->reviews->count();

            return $carry;
        }, ['total_rating' => 0, 'total_reviews' => 0]);

        return $stats['total_reviews'] > 0
            ? round($stats['total_rating'] / $stats['total_reviews'], 2)
            : 0.0;
    }
}
