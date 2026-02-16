<?php

namespace App\Http\Resources\Landing\Home;

use App\Facades\Format;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PopularProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $now = now();
        $hasDetails = ! is_null($this->details);
        $isDiscounted = $hasDetails
            && $this->details->discount_active
            && $this->details->discount_start_date <= $now
            && $this->details->discount_end_date >= $now;

        $result = [
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => Format::formatCurrency($this->price),
            'business_name' => $this->business->name,
            'image_url' => $this->when($hasDetails && $this->details->images, $this->details->images[0] ?? null),
            'is_discounted' => $isDiscounted,
        ];

        if ($isDiscounted) {
            $discountAmount = $this->details->discount_amount;
            $isPercentage = $this->details->discount_type === 'percentage';

            $percentage = $isPercentage
                ? $discountAmount
                : ($discountAmount / $this->price) * 100;

            $finalPrice = $isPercentage
                ? $this->price * (1 - $discountAmount / 100)
                : max(0, $this->price - $discountAmount);

            $result['discount'] = Format::formatNumber($percentage, 0).'%';
            $result['final_price'] = Format::formatCurrency($finalPrice);
        }

        return $result;
    }
}
