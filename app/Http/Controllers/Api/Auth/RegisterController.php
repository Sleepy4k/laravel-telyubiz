<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Resources\Auth\UserResource;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationRequest $request, UserRepository $userRepository): JsonResponse
    {
        $data = $request->validated();

        $user = $userRepository->registerUser($data);

        if (! $user) {
            return Response::error('Something went wrong while creating the user.', [], 500);
        }

        return Response::success('Registration successful', new UserResource($user), 201);
    }
}
