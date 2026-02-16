<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Storage\SystemManager;

/**
 * @method static void alert(string $message, array $context = [])
 * @method static void debug(string $message, array $context = [])
 * @method static void error(string $message, array $context = [])
 * @method static void info(string $message, array $context = [])
 * @method static void warning(string $message, array $context = [])
 *
 * @see SystemManager
 *
 * @mixins \Modules\Storage\SystemManager
 */
class System extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return SystemManager::class;
    }
}
