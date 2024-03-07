<?php

use App\Http\Integrations\OpenWeather\Requests\DailySummaryRequest;
use App\Http\Integrations\OpenWeather\Requests\OneCallRequest;
use App\Models\Board;
use App\Models\Tile;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can fetch pressures', function () {
    MockClient::global([
        DailySummaryRequest::class => MockResponse::fixture('daily-summary'),
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
                    'timezone' => 'America/Chicago',
                ],
                'type' => 'pressure',
            ],
        ],
    ]);

    $this->artisan('board:fetch-pressure')->assertSuccessful();

    $tile = Tile::whereType('pressure')->whereName('60544')->first();

    expect($tile)->not->toBe(null);
    expect($tile->data)->toHaveCount(5);
});
