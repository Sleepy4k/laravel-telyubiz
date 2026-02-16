<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'bio',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'profile_picture_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the user that owns the detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'                  => 'string',
            'user_id'             => 'string',
            'bio'                 => 'string',
            'address'             => 'string',
            'city'                => 'string',
            'state'               => 'string',
            'country'             => 'string',
            'postal_code'         => 'string',
            'profile_picture_url' => 'string',
            'created_at'          => 'datetime',
            'updated_at'          => 'datetime',
        ];
    }
}
