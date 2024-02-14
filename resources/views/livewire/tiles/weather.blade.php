<?php

use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        $weather = new OpenWeatherConnector(config("services.openweather.key"));
        $request = new OneCallRequest($this->data['lat'], $this->data['lon']);

        return [
            'weather' => $weather->send($request)->json(),
        ];
    }
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <div class="w-full mt-2 flex justify-between">
        <p>{{ $data['name'] }}</p>
        <x-weather-icon :id="$weather['current']['weather'][0]['id']" />
    </div>

    <div class="w-full mt-2 flex justify-between">
        <div class="text-5xl">{{ round($weather['current']['temp']) }}°</div>
        <div>
            <p>H: {{ round($weather['daily'][0]['temp']['max']) }}°</p>
            <p>L: {{ round($weather['daily'][0]['temp']['min']) }}°</p>
        </div>
    </div>

    <div class="space-y-2 mt-4">
        @foreach ($weather['daily'] as $index => $day)
        @if ($index > 0 && $index < 5)
        <div class="w-full flex justify-between">
            <div class="flex">
                <p class="w-12">{{ Carbon\Carbon::parse($day['dt'], $weather['timezone'])->format('D') }}</p>
                <x-weather-icon :id="$day['weather'][0]['id']" />
            </div>
            <div class="flex">
                <p class="text-gray-700">{{ round($day['temp']['min']) }}</p>
                <p class="w-9 text-right">{{ round($day['temp']['max']) }}°</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</x-tile>
