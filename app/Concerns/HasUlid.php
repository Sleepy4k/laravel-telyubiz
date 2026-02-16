<?php

namespace App\Concerns;

use Illuminate\Support\Str;

trait HasUlid
{
    /**
     * Generate a new ULID for the model.
     */
    public static function generateUlid(?string $keyname): string
    {
        $ulid = null;

        do {
            $ulid = Str::ulid();
        } while (static::where($keyname ?? 'id', $ulid)->exists());

        return $ulid;
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
     * Boot the ULID trait for the model.
     */
    protected static function bootHasUlid(): void
    {
        static::creating(static function($model): void {
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = static::generateUlid($model->getKeyName());
            }
        });
    }
}
