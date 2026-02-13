<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\SendResetRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;

class ForgotPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function sendResetLink(SendResetRequest $request)
    {
        $data = $request->validated();

        $status = Password::sendResetLink($data);

        return $status === Password::RESET_LINK_SENT
            ? Response::success(__($status))
            : Response::error(__($status), [], 400);
    }

    /**
     * Handle the incoming request.
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        $status = Password::reset($data, function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ]);

            $user->save();
        });

        return $status === Password::PASSWORD_RESET
            ? Response::success(__($status))
            : Response::error(__($status), [], 400);
    }
}
