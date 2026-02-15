<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\Contracts\IEventRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EventRepository implements IEventRepository
{
    /**
     * Store model instance
     * @var Model
     */
    protected Model $model;

    /**
     * Base respository constructor
     *
     * @param  Model  $model
     */
    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    /**
     * Get incoming events
     *
     * @param  array  $columns
     * @return Collection|null
     */
    public function getIncomingEvents(array $columns = ['*']): ?Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('start_time', '>', now())
            ->orderBy('start_time', 'asc')
            ->take(4)
            ->get();
    }
}
