<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
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
        Response::macro('success', fn($message = 'Success', $data = null, $status = 200) => response()->json([
            'code'    => $status,
            'status'  => 'success',
            'message' => $message,
            'data'    => $data,
        ], $status));

        Response::macro('error', fn($message = 'Error', $data = null, $status = 400) => response()->json([
            'code'    => $status,
            'status'  => 'error',
            'message' => $message,
            'data'    => $data,
        ], $status));

        Response::macro('paginated', fn($message, $data, $status = 200) => response()->json([
            'code'    => $status,
            'status'  => 'success',
            'message' => $message,
            'data'    => [
                'items' => $data->items(),
                'links' => [
                    'first' => $data->url(1),
                    'last'  => $data->url($data->lastPage()),
                    'prev'  => $data->previousPageUrl(),
                    'next'  => $data->nextPageUrl(),
                ],
                'meta' => [
                    'current_page' => $data->currentPage(),
                    'from'         => $data->firstItem(),
                    'last_page'    => $data->lastPage(),
                    'path'         => $data->path(),
                    'per_page'     => $data->perPage(),
                    'to'           => $data->lastItem(),
                    'total'        => $data->total(),
                ],
            ],
        ], $status));

        Collection::macro('onlyIntegerKeys', fn() => $this->filter(static fn($value, $key) => is_int($key)));

        Collection::macro('paginate', function($perPage = 15, $page = null, $options = []) {
            $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
            $items = $this->forPage($page, $perPage);

            $options += [
                'path'     => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ];

            return new LengthAwarePaginator(
                $items,
                $this->count(),
                $perPage,
                $page,
                $options,
            );
        });
    }
}
