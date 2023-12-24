<?php

namespace App\Filament\Widgets;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class DeltaStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Temperature Change', $this->todaysTemp . '°F')
                ->description('from ' . $this->yesterdaysTemp  . '°F, ' . abs($this->todaysTemp - $this->yesterdaysTemp) . '°F change')
                ->descriptionIcon(($this->todaysTemp > $this->yesterdaysTemp) ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down'),
            Stat::make('Precipitation Change', $this->todaysWeather['main'])
                ->description('from ' . $this->yesterdaysWeather['main']),
            Stat::make('Joint Pain', $this->jointPain ? 'Likely' : 'Not Likely'),
            Stat::make('Muscle Pain', $this->musclePain ? 'Likely' : 'Not Likely'),
        ];
    }

    public function getJointPainProperty()
    {
        $jointPain = false;

        if(abs($this->todaysTemp - $this->yesterdaysTemp) > 20) {
            $jointPain = true;
        }

        if($this->todaysWeather['id'] < 700 && $this->yesterdaysWeather['id'] > 700) {
            $jointPain = true;
        }

        return $jointPain;
    }

    public function getMusclePainProperty()
    {
        $musclePain = false;

        if($this->todaysTemp < 35) {
            $musclePain = true;
        }

        return $musclePain;
    }

    public function getTodayProperty()
    {
        return $this->getWeatherDataFor(now());
    }

    public function getTodaysTempProperty()
    {
        return $this->today['current']['temp'];
    }

    public function getTodaysWeatherProperty()
    {
        return $this->today['current']['weather'][0];
    }

    public function getYesterdayProperty()
    {
        return $this->getWeatherDataFor(now()->subDay());
    }

    public function getYesterdaysTempProperty()
    {
        return $this->yesterday['current']['temp'];
    }

    public function getYesterdaysWeatherProperty()
    {
        return $this->yesterday['current']['weather'][0];
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
