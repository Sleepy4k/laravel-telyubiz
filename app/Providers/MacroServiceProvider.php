<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($message = 'Success', $data = null, $status = 200) {
            return response()->json([
                'code' => $status,
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        Response::macro('error', function ($message = 'Error', $data = null, $status = 400) {
            return response()->json([
                'code' => $status,
                'status' => 'error',
                'message' => $message,
                'data' => $data,
            ], $status);
        });
    }
}
