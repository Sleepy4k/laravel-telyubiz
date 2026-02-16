<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IEventRepository
{
    /**
     * Get incoming events.
     */
    public function getIncomingEvents(array $columns = ['*']): ?Collection;
}
