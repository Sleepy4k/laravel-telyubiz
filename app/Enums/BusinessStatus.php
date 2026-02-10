<?php

namespace App\Enums;

enum BusinessStatus: string
{
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';

    public function label(): string
    {
        return match ($this) {
            BusinessStatus::ACTIVE => 'Active',
            BusinessStatus::SUSPENDED => 'Suspended',
        };
    }
}
