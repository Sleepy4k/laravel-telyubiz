<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasUuid, Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
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
            'order_id' => 'string',
            'product_id' => 'string',
            'quantity' => 'integer',
            'unit_price' => 'decimal:2',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
