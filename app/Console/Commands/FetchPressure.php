<?php

namespace App\Console\Commands;

use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\DailySummaryRequest;
use App\Models\Board;
use App\Models\Tile;
use Carbon\CarbonInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class FetchPressure extends Command
{
    protected $signature = 'board:fetch-pressure';

    protected $description = 'Fetch pressures from Open Weather';

    public function handle()
    {
        $this->info('Fetching pressures...');

        $coordinates = Board::where('tiles', 'LIKE', '%pressure%')
            ->get()
            ->pluck('tiles')
            ->map(
                fn ($tiles) => collect($tiles)
                    ->filter(fn ($tile) => $tile['type'] === 'pressure')
                    ->pluck('data')
                    ->map(fn ($tile) => Arr::only($tile, ['lat', 'lon', 'zip', 'timezone']))
                    ->unique()
            )
            ->flatten(1)
            ->unique();

        foreach ($coordinates as $point) {
            $dates = [
                '-48' => now($point['timezone'])->subDays(2)->toDateString(),
                '-24' => now($point['timezone'])->subDays(1)->toDateString(),
                'Today' => now($point['timezone'])->toDateString(),
                '+24' => now($point['timezone'])->addDays(1)->toDateString(),
                '+48' => now($point['timezone'])->addDays(2)->toDateString(),
            ];

            $data = [];
            foreach ($dates as $label => $date) {
                $weather = new OpenWeatherConnector;
                $request = new DailySummaryRequest($point['lat'], $point['lon'], $date);
                $response = $weather->send($request);

                if (! $response->failed()) {
                    $data[] = ['label' => $label, 'value' => $response->json()['pressure']['afternoon']];
                }
            }

            Tile::firstOrCreate(['type' => 'pressure', 'name' => $point['zip']])
                ->update(['data' => $data]);
        }

        $this->info('All done!');
    }

    public function getFormattedDate($event, $start, $end): string
    {
        if ($event->isAllDayEvent()) {
            return $start->format('D, M jS');
        }

        if ($start->diffInMinutes($end) > 5) {
            return $start->format('D, M jS g:i a').' ('.$start->diffForHumans($end, CarbonInterface::DIFF_ABSOLUTE, true).')';
        }

        return $start->format('D, M jS g:i a');
    }
}
