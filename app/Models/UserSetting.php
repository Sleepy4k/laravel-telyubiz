<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSetting extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'theme',
        'notification_preferences',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * The default attribute values.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'theme'                    => 'dark',
        'notification_preferences' => [
            'email' => true,
            'push'  => true,
        ],
    ];

    /**
     * Set the cache prefix.
     */
    public function setCachePrefix(): string
    {
        return 'user.setting.cache';
    }

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
            'id'                       => 'string',
            'user_id'                  => 'string',
            'theme'                    => 'string',
            'notification_preferences' => 'array',
            'created_at'               => 'datetime',
            'updated_at'               => 'datetime',
        ];
    }
}
