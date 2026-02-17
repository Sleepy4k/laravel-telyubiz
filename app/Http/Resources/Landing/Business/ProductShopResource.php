<?php

namespace App\Http\Resources\Landing\Business;

use App\Facades\Format;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $now = now();
        $hasDetails = !is_null($this->details);
        $isDiscounted = $hasDetails
            && $this->details->discount_active
            && $this->details->discount_start_date <= $now
            && $this->details->discount_end_date >= $now;

        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
            'business_name' => $this->when($this->relationLoaded('business'), $this->business->name),
            'price'         => Format::formatCurrency($this->price, 'Rp'),
            'order_count'   => $this->when($this->relationLoaded('orders_count'), $this->orders_count, 0),
            'rating'        => $this->when($this->relationLoaded('reviews_avg_rating'), round($this->reviews_avg_rating, 1), 0),
            'image_url'     => $this->when($hasDetails && $this->details->images, $this->details->images[0] ?? null),
            'is_discounted' => $isDiscounted,
            'discount'      => $this->when($isDiscounted, function() {
                $discountAmount = $this->details->discount_amount;
                $isPercentage = $this->details->discount_type === 'percentage';
                $percentage = $isPercentage
                    ? $discountAmount
                    : ($discountAmount / $this->price) * 100;

                return Format::formatNumber($percentage, 0) . '%';
            }),
            'final_price' => $this->when($isDiscounted, function() {
                $discountAmount = $this->details->discount_amount;
                $isPercentage = $this->details->discount_type === 'percentage';
                $finalPrice = $isPercentage
                    ? $this->price * (1 - $discountAmount / 100)
                    : max(0, $this->price - $discountAmount);

                return Format::formatCurrency($finalPrice, 'Rp');
            }),
        ];
    }
}
