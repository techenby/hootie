<?php

use App\Models\User;
use Illuminate\Support\Carbon;

it('clears status after two hours of inactivity', function () {
    $user = User::factory()->create(['status' => 'pairing']);

    Carbon::setTestNow(now()->addHours(2));

    $this->artisan('app:clear-status');

    expect($user->fresh()->status)->toBeNull();
});

it('does not clear status before two hours of inactivity', function () {
    $user = User::factory()->create(['status' => 'pairing']);

    Carbon::setTestNow(now()->addHour());

    $this->artisan('app:clear-status');

    expect($user->fresh()->status)->toBe('pairing');
});

it('does not update null status', function () {
    $user = User::factory()->create(['status' => null]);
    $oldUpdatedAt = $user->updated_at->toDateTimeString();

    Carbon::setTestNow(now()->addHours(2));

    $this->artisan('app:clear-status');

    expect($user->fresh()->updated_at->toDateTimeString())->toBe($oldUpdatedAt);
});
