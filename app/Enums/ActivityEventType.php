<?php

namespace App\Enums;

enum ActivityEventType: string
{
    case MODEL = 'model';
    case LOGIN = 'login';
    case LOGOUT = 'logout';
    case REGISTER = 'register';

    public function label(): string
    {
        return match ($this) {
            ActivityEventType::MODEL => 'Model',
            ActivityEventType::LOGIN => 'Login',
            ActivityEventType::LOGOUT => 'Logout',
            ActivityEventType::REGISTER => 'Register',
        };
    }
}
