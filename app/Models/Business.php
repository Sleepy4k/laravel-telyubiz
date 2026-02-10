<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Business extends Model
{
    use Loggable, Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'owner_id',
        'name',
        'slug',
        'address',
        'phone',
        'description',
        'logo_url',
        'banner_url',
        'status',
        'balance',
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
            'owner_id' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'description' => 'string',
            'logo_url' => 'string',
            'banner_url' => 'string',
            'status' => 'string',
            'balance' => 'decimal:2',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the owner of the business.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
