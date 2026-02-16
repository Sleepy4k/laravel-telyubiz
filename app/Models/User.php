<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use App\Notifications\EmailVerification;
use App\Notifications\RequestResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Cacheable, HasApiTokens, HasFactory, HasRoles, HasUuid, Loggable, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'email_verified_at',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Set the cache prefix.
     */
    public function setCachePrefix(): string
    {
        return 'user.cache';
    }

    /**
     * Set the loggable fields.
     *
     * @return array<string>
     */
    public function setLoggableField(): array
    {
        return array_filter($this->fillable, fn($field) => !in_array($field, $this->hidden));
    }

    /**
     * Send a password reset notification to the user.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $url = url(route('api.reset-password', ['token' => $token, 'phone' => $this->phone], false));
        $this->notify(new RequestResetPassword($this->name, $url));
    }

    /**
     * Send an email verification notification to the user.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new EmailVerification($this->name));
    }

    /**
     * Get the user details associated with the user.
     */
    public function details(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    /**
     * Get the user settings associated with the user.
     */
    public function settings(): HasOne
    {
        return $this->hasOne(UserSetting::class);
    }

    /**
     * Get the businesses owned by the user.
     */
    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class, 'owner_id');
    }

    /**
     * Get the orders made by the user.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    /**
     * Get the reviews written by the user.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'                => 'string',
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
}
