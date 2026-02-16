<?php

namespace App\Http\Resources\Landing\Business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ListShopResource extends JsonResource
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
            'category' => $this->when($this->category, $this->category->name, null),
            'total_reviews' => $this->reviews_count ?? 0,
            'average_rating' => $this->reviews_avg_rating ?? 0.0,
            'logo_url' => $this->logo_url,
            'banner_url' => $this->banner_url,
        ];
    }
}
