<?php

use App\Filament\Clusters\Inventory\Resources\BinResource;
use App\Models\Bin;
use App\Models\User;

use function Pest\Laravel\{actingAs};

it('can view all bins', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(BinResource::getUrl('index'))
        ->assertStatus(200);
});

it('can view bin', function () {
    $user = User::factory()->create();
    $bin = Bin::factory()->create();

    actingAs($user)
        ->get(BinResource::getUrl('view', ['record' => $bin]))
        ->assertStatus(200);
});
