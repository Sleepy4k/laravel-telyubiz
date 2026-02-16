<?php

namespace App\Http\Resources\Landing\Business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'           => $this->name,
            'slug'           => $this->slug,
            'phone'          => $this->phone,
            'address'        => $this->address,
            'description'    => $this->description,
            'category'       => $this->when($this->category, $this->category->name, null),
            'total_products' => $this->products_count ?? 0,
            'total_reviews'  => $this->reviews_count ?? 0,
            'average_rating' => $this->when($this->reviews_avg_rating, round($this->reviews_avg_rating, 2), 0.0),
            'owner'          => $this->when($this->owner, [
                'name'        => $this->owner->name,
                'email'       => $this->owner->email,
                'profile_url' => $this->when($this->owner->details, $this->owner->details->profile_picture_url, null),
            ], null),
            'operational_hours' => $this->whenLoaded('operationalHours', fn() => $this->operationalHours->map(static fn($hour) => [
                'day_of_week' => $hour->day_of_week,
                'open_time'   => $hour->open_time ? $hour->open_time->format('H:i') : null,
                'close_time'  => $hour->close_time ? $hour->close_time->format('H:i') : null,
            ])),
            'logo_url'   => $this->logo_url,
            'banner_url' => $this->banner_url,
            'joined_at'  => $this->created_at->format('F Y'),
        ];
    }
}
