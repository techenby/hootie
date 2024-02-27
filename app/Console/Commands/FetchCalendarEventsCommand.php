<?php

namespace App\Console\Commands;

use App\Models\Board;
use App\Models\Tile;
use Carbon\CarbonInterface;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Spatie\GoogleCalendar\Event;

class FetchCalendarEventsCommand extends Command
{
    protected $signature = 'board:fetch-calendar-events';

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
            $events = collect(Event::get(null, null, [], $calendarId))
                ->filter(fn ($event) =>
                    ! Carbon::createFromFormat('Y-m-d H:i:s', $event->getSortDate())->isPast())
                ->map(function (Event $event) {
                    $start = Carbon::parse($event->start->dateTime ?? $event->start->date);
                    $end = Carbon::parse($event->end->dateTime ?? $event->end->date);

                    return [
                        'name' => $event->name,
                        'start' => $start->format(DateTime::ATOM),
                        'end' => $end->format(DateTime::ATOM),
                        'formatted' => $this->getFormattedDate($event, $start, $end),
                        'is_today' => $start->diffInHours() <= 24,
                    ];
                })
                ->unique('name')
                ->values()
                ->toArray();

            Tile::firstOrCreate(['type' => 'calendar', 'name' => $calendarId])
                ->update(['data' => $events]);
        }

        $this->info('All done!');
    }

    public function getFormattedDate($event, $start, $end): string
    {
        if ($event->isAllDayEvent()) {
            return $start->format('D, M jS');
        }

        if ($start->diffInMinutes($end) > 5) {
            return $start->format('D, M jS g:i a'). ' (' . $start->diffForHumans($end, CarbonInterface::DIFF_ABSOLUTE, true) . ')';
        }

        return $start->format('D, M jS g:i a');
    }
}
