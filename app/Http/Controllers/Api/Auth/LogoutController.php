<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $currentToken = $request->user('api')->currentAccessToken();
        $request->user('api')->tokens()->where('id', $currentToken->id)->delete();

        return Response::success('Logged out successfully');
    }
}
