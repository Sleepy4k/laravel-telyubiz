<?php

namespace App\Concerns;

use ElipZis\Cacheable\Models\Traits\Cacheable as MakeCacheable;

trait Cacheable
{
    use MakeCacheable;

    /**
     * The cache prefix.
     *
     * @var string
     */
    protected static $cachePrefix = 'model.cache';

    /**
     * The cache config.
     *
     * @var array
     */
    protected static $cacheConfig = [];

    /**
     * Set the cache prefix.
     */
    protected function setCachePrefix(): string
    {
        return static::$cachePrefix;
    }

    /**
     * Set the cache config.
     */
    protected function setCacheConfig(): array
    {
        return static::$cacheConfig;
    }

    /**
     * The cacheable properties that should be cached.
     */
    public function getCacheableProperties(): array
    {
        return array_merge(config('cacheable'), array_merge([
            'prefix' => $this->setCachePrefix(),
        ], $this->setCacheConfig()));
    }
}
