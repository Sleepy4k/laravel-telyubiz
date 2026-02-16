<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Parse\PageSpeedManager;

/**
 * @method static mixed parseContent(mixed $content)
 * @method static bool  shouldProcessPageSpeed(\Illuminate\Http\Request $request, \Illuminate\Http\Response $response)
 *
 * @see PageSpeedManager
 *
 * @mixins \Modules\Parse\PageSpeedManager
 */
class PageSpeed extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return PageSpeedManager::class;
    }
}
