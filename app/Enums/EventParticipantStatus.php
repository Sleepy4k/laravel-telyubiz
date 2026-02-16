<?php

namespace App\Enums;

enum EventParticipantStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            EventParticipantStatus::PENDING  => 'Pending',
            EventParticipantStatus::APPROVED => 'Approved',
            EventParticipantStatus::REJECTED => 'Rejected',
        };
    }
}
