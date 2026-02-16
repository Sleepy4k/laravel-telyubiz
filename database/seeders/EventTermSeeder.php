<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventTerm;
use Illuminate\Database\Seeder;

class EventTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (EventTerm::query()->withoutCache()->count() > 0) {
            return;
        }

        $events = Event::query()->withoutCache()->select('id')->get();
        $terms = EventTerm::factory()->count($events->count() * 5)->make();

        $termsWithEventId = $terms->map(function (EventTerm $term, int $index) use ($events) {
            $term->event_id = $events->get(intdiv($index, 5) % $events->count())->id;

            return $term;
        });

        EventTerm::query()->insert($termsWithEventId->toArray());
    }
}
