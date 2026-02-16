<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventTimeline;
use Illuminate\Database\Seeder;

class EventTimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (EventTimeline::query()->withoutCache()->count() > 0) {
            return;
        }

        $events = Event::query()->withoutCache()->select('id')->get();
        $timelines = EventTimeline::factory()->count($events->count() * 5)->make();

        $timelines->map(static function(EventTimeline $timeline, int $index) use ($events): void {
            $timeline->event_id = $events->get(intdiv($index, 5) % $events->count())->id;
            $timeline->save();
        });
    }
}
