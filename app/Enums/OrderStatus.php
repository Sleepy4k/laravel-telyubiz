<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            OrderStatus::PENDING    => 'Pending',
            OrderStatus::PROCESSING => 'Processing',
            OrderStatus::COMPLETED  => 'Completed',
            OrderStatus::CANCELLED  => 'Cancelled',
        };
    }
}
