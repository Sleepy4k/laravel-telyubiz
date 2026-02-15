<?php

namespace App\Http\Resources\Landing\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IncomingEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => Str::limit($this->description, 125),
            'location' => $this->location,
            'start' => [
                'date' => $this->start_time->format('d F Y'),
                'time' => $this->start_time->format('H:i'),
            ],
            'end' => [
                'date' => $this->end_time->format('d F Y'),
                'time' => $this->end_time->format('H:i'),
            ],
            'logo_url' => $this->logo_url,
            'banner_url' => $this->banner_url,
        ];
    }
}
