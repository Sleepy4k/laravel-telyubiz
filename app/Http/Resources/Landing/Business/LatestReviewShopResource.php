<?php

namespace App\Http\Resources\Landing\Business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LatestReviewShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_name'        => $this->product ? $this->product->name : null,
            'rating'              => $this->rating,
            'comment'             => $this->comment,
            'reviewer_name'       => $this->when($this->relationLoaded('user'), $this->user ? $this->user->name : null),
            'reviewer_avatar_url' => $this->when($this->relationLoaded('user') && $this->user && $this->user->relationLoaded('details') && $this->user->details, $this->user->details->profile_picture_url, null),
            'images'              => $this->images ?? [],
            'reviewd_at'          => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
