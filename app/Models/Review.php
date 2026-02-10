<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasUuid, Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'rating',
        'comment',
        'images',
        'is_visible',
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
            'user_id' => 'string',
            'product_id' => 'string',
            'order_id' => 'string',
            'rating' => 'integer',
            'comment' => 'string',
            'images' => 'array',
            'is_visible' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
