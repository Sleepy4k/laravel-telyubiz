<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventDetail extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'event_id',
        'capacity',
        'free_entry',
        'ticket_price',
        'additional_info',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the event that owns the details.
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
            'id'              => 'string',
            'event_id'        => 'string',
            'capacity'        => 'integer',
            'free_entry'      => 'boolean',
            'ticket_price'    => 'decimal:2',
            'additional_info' => 'string',
            'created_at'      => 'datetime',
            'updated_at'      => 'datetime',
        ];
    }
}
