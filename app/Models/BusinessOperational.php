<?php

namespace App\Models;

use App\Casts\TimeCast;
use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessOperational extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'business_id',
        'day_of_week',
        'open_time',
        'close_time',
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
        return 'business.operational.cache';
    }

    /**
     * Get the businesses that belong to the operational status.
     */
    public function businesses(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'          => 'string',
            'business_id' => 'string',
            'day_of_week' => 'string',
            'open_time'   => TimeCast::class,
            'close_time'  => TimeCast::class,
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
        ];
    }
}
