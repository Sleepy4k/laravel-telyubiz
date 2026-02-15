<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventDetail extends Model
{
    use HasFactory, HasUuid, Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'created_by',
        'title',
        'slug',
        'description',
        'location',
        'start_time',
        'end_time',
        'is_open_for_registration',
        'logo_url',
        'banner_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'created_by' => 'string',
            'title' => 'string',
            'slug' => 'string',
            'description' => 'string',
            'location' => 'string',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'is_open_for_registration' => 'boolean',
            'logo_url' => 'string',
            'banner_url' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the categories that belong to the event.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(EventCategory::class, 'event_has_categories', 'event_id', 'category_id');
    }
}
