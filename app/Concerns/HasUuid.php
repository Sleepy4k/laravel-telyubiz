<?php

namespace App\Concerns;

use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

trait HasUuid
{
    /**
     * Generate a new UUID for the model.
     */
    public static function generateUuid(?string $keyname): UuidInterface
    {
        $uuid = null;

        do {
            $uuid = Str::uuid();
        } while (static::where($keyname ?? 'id', $uuid)->exists());

        return $uuid;
    }

    /**
     * Get the primary key for the model.
     */
    public function getKeyName(): string
    {
        return 'id';
    }

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get the data type of the primary key ID.
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * Boot the UUID trait for the model.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(static function($model): void {
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = static::generateUuid($model->getKeyName());
            }
        });
    }
}
