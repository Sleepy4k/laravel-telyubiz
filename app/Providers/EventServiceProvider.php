<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Google\Provider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(SocialiteWasCalled::class, static function(SocialiteWasCalled $event): void {
            $event->extendSocialite('google', Provider::class);
            $event->extendSocialite('microsoft', \SocialiteProviders\Microsoft\Provider::class);
        });
    }
}
