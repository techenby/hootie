<?php

use App\Filament\Clusters\Inventory\Resources\LocationResource;
use App\Models\User;

use function Pest\Laravel\{actingAs};

it('can view all locations', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(LocationResource::getUrl('index'))
        ->assertStatus(200);
});
