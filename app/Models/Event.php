<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use Cacheable, HasFactory, Loggable;

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
     * Set the cache prefix.
     */
    public function setCachePrefix(): string
    {
        return 'event.cache';
    }

    // Get the user that created the event.
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the categories that belong to the event.
     */
    public function details(): HasOne
    {
        return $this->hasOne(EventDetail::class);
    }

    /**
     * Get the categories that belong to the event.
     */
    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(
            EventCategory::class,
            EventHasCategory::class,
            'event_id',
            'id',
            'id',
            'category_id',
        );
    }

    /**
     * Get the participants of the event.
     */
    public function participants(): HasMany
    {
        return $this->hasMany(EventParticipant::class);
    }

    /**
     * Get the terms associated with the event.
     */
    public function terms(): HasMany
    {
        return $this->hasMany(EventTerm::class);
    }

    /**
     * Get the facilities associated with the event.
     */
    public function facilities(): HasMany
    {
        return $this->hasMany(EventFacility::class);
    }

    /**
     * Get the timeline entries associated with the event.
     */
    public function timelines(): HasMany
    {
        return $this->hasMany(EventTimeline::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'                       => 'string',
            'created_by'               => 'string',
            'title'                    => 'string',
            'slug'                     => 'string',
            'description'              => 'string',
            'location'                 => 'string',
            'start_time'               => 'datetime',
            'end_time'                 => 'datetime',
            'is_open_for_registration' => 'boolean',
            'logo_url'                 => 'string',
            'banner_url'               => 'string',
            'created_at'               => 'datetime',
            'updated_at'               => 'datetime',
        ];
    }
}
