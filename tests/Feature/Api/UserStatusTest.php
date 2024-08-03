<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

it('can add status of user', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->postJson('/api/user/status', [
            'status' => 'pairing',
        ])
        ->assertStatus(200);

    expect($user->fresh()->status)->toBe('pairing');
});

it('can replace status of user', function () {
    $user = User::factory()->create(['status' => 'meeting']);

    actingAs($user)
        ->postJson('/api/user/status', [
            'status' => 'pairing',
        ])
        ->assertStatus(200);

    expect($user->fresh()->status)->toBe('pairing');
});

it('requires status', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->postJson('/api/user/status', [
            // 'status' => 'pairing',
        ])
        ->assertJsonValidationErrorFor('status');

    expect($user->fresh()->status)->not->toBe('pairing');
});

it('can clear status', function () {
    $user = User::factory()->create(['status' => 'pairing']);

    actingAs($user)
        ->deleteJson('/api/user/status')
        ->assertOk();

    expect($user->fresh()->status)->toBeNull();
});
