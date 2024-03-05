<?php

namespace App\Console\Commands;

use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use App\Models\Board;
use App\Models\Tile;
use Carbon\CarbonInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class FetchWeather extends Command
{
    protected $signature = 'board:fetch-weather';

    protected $description = 'Fetch events from Open Weather';

    public function handle()
    {
        $this->info('Fetching weather...');

        $coordinates = Board::where('tiles', 'LIKE', '%weather%')
            ->get()
            ->pluck('tiles')
            ->map(
                fn ($tiles) => collect($tiles)
                    ->filter(fn ($tile) => $tile['type'] === 'weather')
                    ->pluck('data')
                    ->map(fn ($tile) => Arr::only($tile, ['lat', 'lon', 'zip']))
                    ->unique()
            )
            ->flatten(1)
            ->unique();

        foreach ($coordinates as $point) {
            $weather = new OpenWeatherConnector;
            $request = new OneCallRequest($point['lat'], $point['lon']);
            $response = $weather->send($request);

            if (! $response->failed()) {
                $data = $response->json();
                Tile::firstOrCreate(['type' => 'weather', 'name' => $point['zip']])
                    ->update(['data' => $data]);
            }
        }

        $this->info('All done!');
    }

    public function getFormattedDate($event, $start, $end): string
    {
        if ($event->isAllDayEvent()) {
            return $start->format('D, M jS');
        }

        if ($start->diffInMinutes($end) > 5) {
            return $start->format('D, M jS g:i a') . ' (' . $start->diffForHumans($end, CarbonInterface::DIFF_ABSOLUTE, true) . ')';
        }

        return $start->format('D, M jS g:i a');
    }
}
