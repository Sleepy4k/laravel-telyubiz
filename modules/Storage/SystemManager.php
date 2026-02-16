<?php

namespace Modules\Storage;

use Illuminate\Support\Facades\Log;

class SystemManager
{
    /** Indicates if the application is in production. */
    private bool $isProduction;

    /**
     * Constructor to initialize the SystemManager.
     */
    public function __construct()
    {
        $this->isProduction = app()->isProduction();
    }

    /**
     * Log a warning message.
     */
    public function warning(string $message, array $context = []): void
    {
        if ($this->isProduction) {
            return;
        }

        Log::warning($message, $context);
    }

    /**
     * Log an error message.
     */
    public function error(string $message, array $context = []): void
    {
        if ($this->isProduction) {
            return;
        }

        Log::error($message, $context);
    }

    /**
     * Log an alert message.
     */
    public function alert(string $message, array $context = []): void
    {
        if ($this->isProduction) {
            return;
        }

        Log::alert($message, $context);
    }

    /**
     * Log a debug message.
     */
    public function debug(string $message, array $context = []): void
    {
        if ($this->isProduction) {
            return;
        }

        Log::debug($message, $context);
    }

    /**
     * Log an info message.
     */
    public function info(string $message, array $context = []): void
    {
        if ($this->isProduction) {
            return;
        }

        Log::info($message, $context);
    }
}
