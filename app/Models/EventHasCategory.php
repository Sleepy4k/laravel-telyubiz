<?php

declare(strict_types=1);
namespace App\Models;

use App\Concerns\Cacheable;
use App\Concerns\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventHasCategory extends Model
{
    use Cacheable, HasFactory, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'event_id',
        'category_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the event that belongs to the category.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    /**
     * Get the category that belongs to the event.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
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
            'event_id'    => 'string',
            'category_id' => 'string',
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
        ];
    }
}
