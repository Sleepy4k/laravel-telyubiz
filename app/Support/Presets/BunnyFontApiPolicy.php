<?php

namespace App\Support\Presets;

use Spatie\Csp\Directive;
use Spatie\Csp\Policy;
use Spatie\Csp\Preset;

class BunnyFontApiPolicy implements Preset
{
    /**
     * Configure csp policies for general and other policy
     */
    public function configure(Policy $policy): void
    {
        $policy->add([Directive::FONT], 'fonts.bunny.net');
    }
}
