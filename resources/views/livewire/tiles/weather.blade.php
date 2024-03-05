<?php

use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use App\Models\Tile;
use Illuminate\Support\Facades\Cache;
use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        return [
            'weather' => Tile::whereType('weather')->whereName($this->data['zip'])->first()->data,
            'component' => match($this->data['width'] . 'x' . $this->data['height']) {
                '2x1' => 'tiles.weather-2x1',
                default => 'tiles.weather-1x1',
            },
            'name' => $this->data['name'],
        ];
    }
}; ?>

<x-dynamic-component :component="$component" :weather="$weather" :name="$name" />
