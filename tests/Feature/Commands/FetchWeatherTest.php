<?php

use App\Filament\Resources\PointResource;
use App\Filament\Resources\PointResource\Pages\CreatePoint;
use App\Filament\Resources\PointResource\Pages\EditPoint;
use App\Filament\Widgets\DeltaStats;
use App\Models\Board;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\{actingAs};
use function Pest\Livewire\livewire;
use function PHPUnit\Framework\assertEquals;

it('can fetch weather', function () {
    $board = Board::factory()->create([
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

    actingAs($user)
        ->get(PointResource::getUrl('index'))
        ->assertStatus(200);
});
