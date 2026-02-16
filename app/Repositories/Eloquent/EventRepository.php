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
     */
    public function getIncomingEvents(array $columns = ['*']): ?Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with(['creator:id,name'])
            ->withCount('participants')
            ->orderBy('start_time', 'asc')
            ->orderBy('end_time', 'asc')
            ->where('start_time', '>', now())
            ->take(4)
            ->get();
    }
}
