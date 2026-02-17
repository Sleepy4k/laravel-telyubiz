<?php

namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\HasUuid;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use Cacheable, HasFactory, HasUuid, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'bank_name',
        'account_number',
        'account_holder_name',
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
        return 'bank.account.cache';
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
            'bank_name'           => 'string',
            'account_number'      => 'string',
            'account_holder_name' => 'string',
            'created_at'          => 'datetime',
            'updated_at'          => 'datetime',
        ];
    }
}
