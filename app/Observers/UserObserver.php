<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\PasswordChanged;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        if ($user->roles()->count() === 0) {
            $user->assignRole(config('rbac.role.default'));
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->wasChanged('password')) {
            $user->tokens()->delete();
            $user->notify(new PasswordChanged($user->name, $user->email));
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }
}
