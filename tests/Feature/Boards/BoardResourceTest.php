<?php

use App\Filament\Resources\BoardResource;
use App\Filament\Resources\BoardResource\Pages\EditBoard;
use App\Http\Integrations\OpenWeather\Requests\ZipRequest;
use App\Models\Board;
use App\Models\User;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

use function Pest\Laravel\{actingAs};
use function Pest\Livewire\livewire;

it('can view all boards', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(BoardResource::getUrl('index'))
        ->assertStatus(200);
});

it('can view edit board page', function () {
    $user = User::factory()->create();
    $board = Board::factory()->create();

    actingAs($user)
        ->get(BoardResource::getUrl('edit', ['record' => $board]))
        ->assertStatus(200);
});

it('adding a weather tile looks up lat/long', function () {
    MockClient::global([
        ZipRequest::class => MockResponse::fixture('zip'),
    ]);

    $board = Board::factory()->create();

    livewire(EditBoard::class, ['record' => $board->getRouteKey()])
        ->fillForm([
            'tiles' => [
                [
                    'type' => 'weather',
                    'data' => [
                        'zip' => 60544,
                        'type' => 'livewire',
                        'width' => 1,
                        'height' => 1,
                    ],
                ],
            ],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($board->fresh()->tiles)->toHaveCount(1);
    tap($board->fresh()->tiles[0]['data'], function ($data) {
        expect($data['zip'])->toBe(60544);
        expect($data['type'])->toBe('livewire');
        expect($data['width'])->toBe(1);
        expect($data['height'])->toBe(1);
        expect($data['name'])->toBe('Plainfield');
        expect($data['lat'])->toBe(41.6009);
        expect($data['lon'])->toBe(-88.1994);
        expect($data['country'])->toBe('US');
    });
});

it('adding a pressure tile looks up lat/long', function () {
    MockClient::global([
        ZipRequest::class => MockResponse::fixture('zip'),
    ]);

    $board = Board::factory()->create();

    livewire(EditBoard::class, ['record' => $board->getRouteKey()])
        ->fillForm([
            'tiles' => [
                [
                    'type' => 'barometric',
                    'data' => [
                        'zip' => 60544,
                        'timezone' => 'America/Chicago',
                        'type' => 'livewire',
                        'width' => 1,
                        'height' => 1,
                    ],
                ],
            ],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($board->fresh()->tiles)->toHaveCount(1);
    tap($board->fresh()->tiles[0]['data'], function ($data) {
        expect($data['zip'])->toBe(60544);
        expect($data['timezone'])->toBe('America/Chicago');
        expect($data['type'])->toBe('livewire');
        expect($data['width'])->toBe(1);
        expect($data['height'])->toBe(1);
        expect($data['name'])->toBe('Plainfield');
        expect($data['lat'])->toBe(41.6009);
        expect($data['lon'])->toBe(-88.1994);
        expect($data['country'])->toBe('US');
    });
});
