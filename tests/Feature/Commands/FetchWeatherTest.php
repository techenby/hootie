<?php

use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use App\Models\Board;
use App\Models\Tile;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can fetch weather', function () {
    MockClient::global([
        OneCallRequest::class => MockResponse::fixture('onecall'),
    ]);

    Board::factory()->create([
        'tiles' => [
            [
                'data' => [
                    'lat' => 41.6009,
                    'lon' => -88.1994,
                    'zip' => '60544',
                    'name' => 'Plainfield',
                    'type' => 'livewire',
                    'width' => 1,
                    'height' => 1,
                    'country' => 'US',
                ],
                'type' => 'weather',
            ],
        ]
    ]);

    $this->artisan('board:fetch-weather')->assertSuccessful();

    $tile = Tile::whereType('weather')->whereName('60544')->first();

    expect($tile)->not->toBe(null);
    expect($tile->data['lat'])->toBe(41.6009);
    expect($tile->data['lon'])->toBe(-88.1994);
    expect($tile->data)->toHaveKeys(['current', 'daily']);
});
