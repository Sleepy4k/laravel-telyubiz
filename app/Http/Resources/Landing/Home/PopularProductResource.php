<?php

namespace App\Http\Resources\Landing\Home;

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
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->formatCurrency($this->price),
            'business_name' => $this->business->name,
            'image_url' => $this->getFirstImage(),
            'is_discounted' => $this->isDiscountActive(),
            $this->mergeWhen($this->isDiscountActive(), [
                'discount' => $this->getDiscountPercentage(),
                'final_price' => $this->getFinalPrice(),
            ]),
        ];
    }

    /**
     * Check if the product has an active discount.
     */
    private function isDiscountActive(): bool
    {
        if (!$this->details) {
            return false;
        }

        $now = now();

        return $this->details->discount_active
            && $this->details->discount_start_date <= $now
            && $this->details->discount_end_date >= $now;
    }

    /**
     * Get the first product image or null if none exists.
     */
    private function getFirstImage(): ?string
    {
        if (!$this->details || !$this->details->images) {
            return null;
        }

        return $this->details->images[0] ?? null;
    }

    /**
     * Calculate and format the discount percentage.
     */
    private function getDiscountPercentage(): string
    {
        $percentage = $this->details->discount_type === 'percentage'
            ? $this->details->discount_amount
            : ($this->details->discount_amount / $this->price) * 100;

        return number_format($percentage, 0, ',', '.') . '%';
    }

    /**
     * Calculate the final price after discount.
     */
    private function getFinalPrice(): string
    {
        $finalPrice = $this->details->discount_type === 'percentage'
            ? $this->price * (1 - $this->details->discount_amount / 100)
            : max(0, $this->price - $this->details->discount_amount);

        return $this->formatCurrency($finalPrice);
    }

    /**
     * Format amount to Indonesian Rupiah currency.
     */
    private function formatCurrency(float $amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}
