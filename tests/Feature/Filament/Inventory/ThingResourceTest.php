<?php

use App\Filament\Clusters\Inventory\Resources\ThingResource;
use App\Models\User;

use function Pest\Laravel\{actingAs};

it('can view all things', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(ThingResource::getUrl('index'))
        ->assertStatus(200);
});
