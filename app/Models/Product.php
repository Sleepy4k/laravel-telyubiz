<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'business_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
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
            'business_id' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string',
            'price' => 'decimal:2',
            'stock' => 'integer',
            'category_id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
