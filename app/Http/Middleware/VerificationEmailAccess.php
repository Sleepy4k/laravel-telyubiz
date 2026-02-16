<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Symfony\Component\HttpFoundation\Response;

class VerificationEmailAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('web')->check()) {
            if ($request->expectsJson()) {
                return FacadesResponse::error('You must be logged in to access this page.', [], 401);
            }

            return to_route('login')->with('error', 'You must be logged in to access this page.');
        }

        if (auth('web')->user()->hasVerifiedEmail()) {
            if ($request->expectsJson()) {
                return FacadesResponse::error('Your email is already verified.', [], 400);
            }

            return to_route('dashboard')->with('info', 'Your email is already verified.');
        }

        return $next($request);
    }
}
