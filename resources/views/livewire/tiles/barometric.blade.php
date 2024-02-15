<?php

use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\DailySummaryRequest;
use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        $weather = new OpenWeatherConnector(config("services.openweather.key"));
        $timezone = $this->data['timezone'] ?? 'America/Chicago';

        return [
            'pressures' => [
                ['label' => '-48', 'value' => $this->getPressure($weather, now($timezone)->subDays(2)->toDateString())],
                ['label' => '-24', 'value' => $this->getPressure($weather, now($timezone)->subDays(1)->toDateString())],
                ['label' => 'Today', 'value' => $this->getPressure($weather, now($timezone)->toDateString())],
                ['label' => '+24', 'value' => $this->getPressure($weather, now($timezone)->addDays(1)->toDateString())],
                ['label' => '+48', 'value' => $this->getPressure($weather, now($timezone)->addDays(2)->toDateString())],
            ]
        ];
    }

    private function getPressure($weather, $date)
    {
        $request = new DailySummaryRequest($this->data['lat'], $this->data['lon'], $date);
        return $weather->send($request)->json()['pressure']['afternoon'];
    }
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <p>{{ $data['name'] }}</p>

    <dl class="divide-y divide-gray-100">
        @foreach($pressures as $pressure)
        <div class="py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">{{ $pressure['label'] }}</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pressure['value'] }} hPa</dd>
        </div>
        @endforeach
    </dl>
</x-tile>
