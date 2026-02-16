<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            $domain = parse_url(config('app.url'), PHP_URL_HOST);

            Route::middleware('web')
                ->domain($domain)
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->domain("api.{$domain}")
                ->group(base_path('routes/api.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->throttleApi();
        $middleware->web(
            prepend: [
                \Illuminate\Routing\Middleware\ThrottleRequests::class.':web',
            ],
            append: [
                \App\Http\Middleware\ImplementPageSpeed::class,
            ]
        );

        $middleware->append([
            \Spatie\Csp\AddCspHeaders::class,
            \App\Http\Middleware\AddSecureHeaderRequest::class,
        ]);

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'verified.email' => \App\Http\Middleware\VerificationEmailAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->respond(function (Response $response, Throwable $exception, Request $request) {
            $currentDomain = $request->getHost();
            if (
                str_starts_with($currentDomain, 'www.') ||
                $currentDomain === parse_url(config('app.url'), PHP_URL_HOST)
            ) {
                return (new \App\Http\Middleware\ImplementPageSpeed)
                    ->handle($request, fn ($req) => $response);
            }

            return match (true) {
                $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException,
                $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException => FacadesResponse::error('Resource not found', null, 404),

                $exception instanceof \Illuminate\Validation\ValidationException => FacadesResponse::error('The given data was invalid.', $exception->errors(), 422),

                $exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException => FacadesResponse::error('Method Not Allowed', null, 405),

                $exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException => FacadesResponse::error($exception->getMessage(), null, $exception->getStatusCode()),

                $exception instanceof \Illuminate\Auth\Access\AuthorizationException ||
                $exception instanceof \Laravel\Sanctum\Exceptions\MissingAbilityException => FacadesResponse::error('You do not have the required permissions to access this resource.', null, 403),

                $exception instanceof \Illuminate\Auth\AuthenticationException => FacadesResponse::error('You are not authenticated to access this resource.', null, 401),

                default => FacadesResponse::error('An unexpected error occurred. Please try again later.', null, 500),
            };
        });
    })->create();
