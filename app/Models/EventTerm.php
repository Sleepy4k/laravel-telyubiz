<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventTerm extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'event_id',
        'term',
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
        return 'event.term.cache';
    }

    /**
     * Get the event that owns the term entry.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'         => 'string',
            'event_id'   => 'string',
            'term'       => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
