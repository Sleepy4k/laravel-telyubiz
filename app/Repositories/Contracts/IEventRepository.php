<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IEventRepository
{
    /**
     * Get incoming events
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function getIncomingEvents(array $columns = ['*']): ?Collection;
}
