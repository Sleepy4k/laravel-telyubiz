<?php

namespace App\Http\Resources\Landing\Home;

use App\Facades\Format;
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
            'title'              => $this->title,
            'slug'               => $this->slug,
            'is_open'            => $this->is_open_for_registration,
            'description'        => Str::limit($this->description, 100),
            'location'           => $this->location,
            'participants_count' => $this->participants_count,
            $this->mergeWhen($this->relationLoaded('details') && $this->details, [
                'capacity'     => $this->details->capacity,
                'free_entry'   => $this->details->free_entry,
                'ticket_price' => $this->when(!$this->details->free_entry, Format::formatCurrency($this->details->ticket_price, 'Rp')),
            ]),
            $this->mergeWhen($this->relationLoaded('creator') && $this->creator, [
                'creator' => $this->creator->name,
            ]),
            $this->mergeWhen($this->relationLoaded('categories') && $this->categories, [
                'categories' => $this->categories->pluck('name'),
            ]),
            'start' => [
                'date' => $this->start_time->format('d F Y'),
                'time' => $this->start_time->format('H:i'),
            ],
            'end' => [
                'date' => $this->end_time->format('d F Y'),
                'time' => $this->end_time->format('H:i'),
            ],
            'logo_url'   => $this->logo_url,
            'banner_url' => $this->banner_url,
        ];
    }
}
