<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request, UserRepository $userRepository)
    {
        $data = $request->validated();

        $user = $userRepository->getUserByUniqueData(
            $data['phone_email'],
            filter_var($data['phone_email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone',
            ['id', 'name', 'email', 'phone', 'password']
        );

        if (!$user) {
            return Response::error('User record not found in our database.', [], 401);
        }

        if (!password_verify($data['password'], $user->password)) {
            return Response::error('The provided credentials are incorrect.', [], 401);
        }

        $token = $user->createToken('auth_token', [], now()->addHours(8))->plainTextToken;

        return Response::success('Login successful', [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
