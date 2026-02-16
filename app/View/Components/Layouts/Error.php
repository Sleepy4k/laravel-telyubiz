<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public int $code,
        public string $message,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|string|View
    {
        return view('components.layouts.error');
    }
}
