<?php

namespace App\Filament\Clusters\Delta\Resources\PointResource\Pages;

use App\Filament\Clusters\Delta\Resources\PointResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CreatePoint extends CreateRecord
{
    protected static string $resource = PointResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $today = $this->getWeatherDataFor(now());
        $yesterday = $this->getWeatherDataFor(now()->subDay());

        $stats = [
            'today_temp' => $today['current']['temp'],
            'today_weather' => $today['current']['weather'][0]['description'],
            'yesterday_temp' => $yesterday['current']['temp'],
            'yesterday_weather' => $yesterday['current']['weather'][0]['description'],
        ];

        return static::getModel()::create([...$data, ...$stats, 'user_id' => auth()->id()]);
    }

    private function getWeatherDataFor(Carbon $date): array
    {
        return Http::get('https://api.openweathermap.org/data/2.5/onecall/timemachine', [
            'lat' => config('services.openweather.lat'),
            'lon' => config('services.openweather.long'),
            'dt' => $date->timestamp,
            'appid' => config('services.openweather.key'),
            'units' => 'imperial',
        ])->json();
    }
}
