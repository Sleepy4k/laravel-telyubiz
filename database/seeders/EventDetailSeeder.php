<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Database\Seeder;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (EventDetail::query()->withoutCache()->count() > 0) {
            return;
        }

        $events = Event::query()->withoutCache()->select('id')->get();
        $details = EventDetail::factory()->count($events->count())->make();

        $detailsWithEventId = $details->map(static function(EventDetail $detail, int $index) use ($events) {
            $detail->event_id = $events->get($index % $events->count())->id;

            return $detail;
        });

        EventDetail::query()->insert($detailsWithEventId->toArray());
    }
}
