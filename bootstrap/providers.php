<?php

use App\Providers\AppServiceProvider;
use App\Providers\BindServiceProvider;
use App\Providers\EventServiceProvider;
use App\Providers\GateServiceProvider;
use App\Providers\MacroServiceProvider;
use App\Providers\RouteServiceProvider;

return [
    AppServiceProvider::class,
    BindServiceProvider::class,
    EventServiceProvider::class,
    GateServiceProvider::class,
    MacroServiceProvider::class,
    RouteServiceProvider::class,
];
