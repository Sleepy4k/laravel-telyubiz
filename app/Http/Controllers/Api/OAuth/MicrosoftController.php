<?php

namespace App\Http\Controllers\Api\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftController extends Controller
{
    /**
     * Redirect the user to the Microsoft authentication page.
     */
    public function redirect(): JsonResponse
    {
        $url = Socialite::driver('microsoft')
            ->stateless()
            ->redirect()
            ->getTargetUrl();

        return Response::success('Redirecting to Microsoft for authentication', [
            'url' => $url,
        ]);
    }

    /**
     * Handle the callback from Microsoft.
     */
    public function callback(): JsonResponse
    {
        try {
            $socialUser = Socialite::driver('microsoft')->stateless()->user();

            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                $user->update([
                    'provider' => 'microsoft',
                    'provider_id' => $socialUser->getId(),
                ]);
            } else {
                $user = User::create([
                    'email' => $socialUser->getEmail(),
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'password' => Str::random(16),
                    'provider' => 'microsoft',
                    'provider_id' => $socialUser->getId(),
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return Response::success('Login successful', [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (Exception $e) {
            return Response::error('Authentication failed: ' . $e->getMessage(), [], 500);
        }
    }
}
