<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventFacility;
use Illuminate\Database\Seeder;

class EventFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (EventFacility::query()->withoutCache()->count() > 0) {
            return;
        }

        $events = Event::query()->withoutCache()->select('id')->get();
        $facilities = EventFacility::factory()->count($events->count() * 5)->make();

        $facilitiesWithEventId = $facilities->map(static function(EventFacility $facility, int $index) use ($events) {
            $facility->event_id = $events->get(intdiv($index, 5) % $events->count())->id;

            return $facility;
        });

        EventFacility::query()->insert($facilitiesWithEventId->toArray());
    }
}
