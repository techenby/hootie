<?php

namespace App\Console\Commands;

use App\Models\Board;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class FetchCalendarEventsCommand extends Command
{
    protected $signature = 'board:fetch-calendar-events-command';

    protected $description = 'Fetch events from a Google Calendar';

    public function handle()
    {
        $this->info('Fetching calendar events...');

        $calendarIds = Board::where('tiles', 'LIKE', '%agenda-calendar%')
            ->get()
            ->pluck('tiles')
            ->map(
                fn ($tiles) => collect($tiles)
                    ->filter(fn ($tile) => $tile['type'] === 'agenda-calendar')
                    ->pluck('data.emails')
                    ->flatten()
                    ->unique()
            )
            ->flatten()
            ->unique();

        foreach ($calendarIds as $calendarId) {
            // dd($calendarId);
            // $events = collect(Event::get(null, null, [], $calendarId))
            //     ->map(function (Event $event) {
            //         $sortDate = $event->getSortDate();

            //         return [
            //             'name' => $event->name,
            //             'date' => Carbon::createFromFormat('Y-m-d H:i:s', $sortDate)->format(DateTime::ATOM),
            //         ];
            //     })
            //     ->unique('name')
            //     ->toArray();

            // CalendarStore::make()->setEventsForCalendarId($events, $calendarId);
        }

        $this->info('All done!');
    }
}
