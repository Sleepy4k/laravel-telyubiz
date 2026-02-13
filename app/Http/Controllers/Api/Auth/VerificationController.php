<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = auth('api')->user();

        if (!$user || $user->id != $id) {
            return Response::error('Unauthorized.', [], 401);
        }

        if ($user->hasVerifiedEmail()) {
            return Response::error('Email already verified.', [], 400);
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return Response::error('Invalid verification link.', [], 400);
        }

        $user->markEmailAsVerified();

        return Response::success('Email verified successfully.', [], 200);
    }

    public function resend(Request $request)
    {
        $user = auth('api')->user();

        if (!$user) {
            return Response::error('Unauthorized.', [], 401);
        }

        if ($user->hasVerifiedEmail()) {
            return Response::error('Email already verified.', [], 400);
        }

        $user->sendEmailVerificationNotification();

        return Response::success('Verification email resent successfully.', [], 200);
    }
}
