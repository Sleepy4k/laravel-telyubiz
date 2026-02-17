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
            'name'          => $this->name,
            'slug'          => $this->slug,
            'category'      => $this->whenLoaded('category', $this->category ? $this->category->name : null),
            'address'       => $this->address,
            'description'   => Str::limit($this->description, 60),
            'total_reviews' => $this->products->sum(static fn($product) => $product->reviews->count()),
            'rating'        => $this->when($this->relationLoaded('products') && $this->products->isNotEmpty(), function() {
                $totalRating = $this->products->sum(static fn($product) => $product->reviews->sum('rating'));
                $totalReviews = $this->products->sum(static fn($product) => $product->reviews->count());

                return $totalReviews > 0 ? round($totalRating / $totalReviews, 1) : 0.0;
            }, 0.0),
            'logo_url'   => $this->logo_url,
            'banner_url' => $this->banner_url,
        ];
    }
}
