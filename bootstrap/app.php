<?php

use App\Http\Middleware\AddSecureHeaderRequest;
use App\Http\Middleware\ImplementPageSpeed;
use App\Http\Middleware\VerificationEmailAccess;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Exceptions\MissingAbilityException;
use Spatie\Csp\AddCspHeaders;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: static function(): void {
            $domain = parse_url(config('app.url'), PHP_URL_HOST);

            Route::middleware('web')
                ->domain($domain)
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->domain("api.{$domain}")
                ->group(base_path('routes/api.php'));
        },
    )
    ->withMiddleware(static function(Middleware $middleware): void {
        $middleware->throttleApi();
        $middleware->web(
            prepend: [
                ThrottleRequests::class . ':web',
            ],
            append: [
                ImplementPageSpeed::class,
            ],
        );

        $middleware->append([
            AddCspHeaders::class,
            AddSecureHeaderRequest::class,
        ]);

        $middleware->alias([
            'role'               => RoleMiddleware::class,
            'permission'         => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'verified.email'     => VerificationEmailAccess::class,
        ]);
    })
    ->withExceptions(static function(Exceptions $exceptions): void {
        $exceptions->respond(static function(Response $response, Throwable $exception, Request $request) {
            $currentDomain = $request->getHost();
            if (
                str_starts_with($currentDomain, 'www.')
                || $currentDomain === parse_url(config('app.url'), PHP_URL_HOST)
            ) {
                return (new ImplementPageSpeed())
                    ->handle($request, static fn($req) => $response);
            }

            return match (true) {
                $exception instanceof ModelNotFoundException,
                $exception instanceof NotFoundHttpException => FacadesResponse::error('Resource not found', null, 404),

                $exception instanceof ValidationException => FacadesResponse::error('The given data was invalid.', $exception->errors(), 422),

                $exception instanceof MethodNotAllowedHttpException => FacadesResponse::error('Method Not Allowed', null, 405),

                $exception instanceof HttpException => FacadesResponse::error($exception->getMessage(), null, $exception->getStatusCode()),

                $exception instanceof AuthorizationException
                || $exception instanceof MissingAbilityException => FacadesResponse::error('You do not have the required permissions to access this resource.', null, 403),

                $exception instanceof AuthenticationException => FacadesResponse::error('You are not authenticated to access this resource.', null, 401),

                default => FacadesResponse::error('An unexpected error occurred. Please try again later.', null, 500),
            };
        });
    })->create();
