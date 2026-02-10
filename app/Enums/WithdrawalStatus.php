<?php

namespace App\Enums;

enum WithdrawalStatus: string
{
    case REQUESTED = 'requested';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case TRANSFERRED = 'transferred';

    public function label(): string
    {
        return match ($this) {
            WithdrawalStatus::REQUESTED => 'Requested',
            WithdrawalStatus::APPROVED => 'Approved',
            WithdrawalStatus::REJECTED => 'Rejected',
            WithdrawalStatus::TRANSFERRED => 'Transferred',
        };
    }
}
