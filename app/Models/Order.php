<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuid, Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'buyer_id',
        'business_id',
        'event_id',
        'total_amount',
        'is_paid',
        'status',
        'payment_gateway_reference',
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
            'buyer_id' => 'string',
            'business_id' => 'string',
            'event_id' => 'string',
            'total_amount' => 'decimal:2',
            'is_paid' => 'boolean',
            'status' => 'string',
            'payment_gateway_reference' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
