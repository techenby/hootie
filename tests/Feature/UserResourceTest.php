<?php

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Pages\ManageUsers;
use App\Models\Point;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\{actingAs};
use function Pest\Livewire\livewire;

it('can view all users', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(UserResource::getUrl('index'))
        ->assertStatus(200);
});

it('can create user', function () {
    livewire(ManageUsers::class)
        ->callAction(CreateAction::class, data: [
            'name' => 'Monkey D. Luffy',
            'email' => 'luffy@straw-hat.pirate',
            'password' => 'password',
        ])
        ->assertHasNoActionErrors();

    $user = User::firstWhere('email', 'luffy@straw-hat.pirate');

    expect($user->name)->toBe('Monkey D. Luffy');
    expect(Hash::check('password', $user->password))->toBeTrue();
});

it('cannot create user with duplicate email', function () {
    $user = User::factory()->create([
        'email' => 'luffy@straw-hat.pirate',
    ]);

    livewire(ManageUsers::class)
        ->callAction(CreateAction::class, data: [
            'name' => 'Monkey D. Luffy',
            'email' => 'luffy@straw-hat.pirate',
            'password' => 'password',
        ])
        ->assertHasActionErrors();
});

it('can edit user', function () {
    $user = User::factory()->create([
        'name' => 'Monkey D. Luffy',
        'email' => 'luffy@straw-hat.pirate',
    ]);

    livewire(ManageUsers::class)
        ->callTableAction(EditAction::class, $user, data: [
            'name' => 'Captain Monkey D. Luffy',
            'email' => 'captain-luffy@straw-hat.pirate',
        ])
        ->assertHasNoActionErrors();

    expect($user->fresh()->name)->toBe('Captain Monkey D. Luffy');
    expect($user->fresh()->email)->toBe('captain-luffy@straw-hat.pirate');
});

it('cannot edit user with duplicate email', function () {
    User::factory()->create([
        'email' => 'luffy@straw-hat.pirate',
    ]);
    $user = User::factory()->create();

    livewire(ManageUsers::class)
        ->callTableAction(EditAction::class, $user, data: [
            'name' => 'Monkey D. Luffy',
            'email' => 'luffy@straw-hat.pirate',
        ])
        ->assertHasActionErrors();
});

it('ignores email unique constraint on edit when updating user with that email', function () {
    $user = User::factory()->create([
        'email' => 'luffy@straw-hat.pirate',
    ]);

    livewire(ManageUsers::class)
        ->callTableAction(EditAction::class, $user, data: [
            'name' => 'Monkey D. Luffy',
            'email' => 'luffy@straw-hat.pirate',
        ])
        ->assertHasNoActionErrors();
});

it('can mark email as verified', function () {
    $user = User::factory()->unverified()->create([
        'name' => 'Monkey D. Luffy',
        'email' => 'luffy@straw-hat.pirate',
    ]);

    livewire(ManageUsers::class)
        ->callTableAction('manually_verify_user', $user)
        ->assertHasNoActionErrors();

    expect($user->fresh()->email_verified_at)->not->toBeNull();
    expect($user->fresh()->email_verified_at)->not->toBeNull();
});

it('can update password', function () {
    $user = User::factory()->create([
        'name' => 'Monkey D. Luffy',
        'email' => 'luffy@straw-hat.pirate',
        'password' => Hash::make('secret-password'),
    ]);

    livewire(ManageUsers::class)
        ->callTableAction('change_password', $user, data: [
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
        ->assertHasNoActionErrors();

    expect(Hash::check('password', $user->fresh()->password))->toBeTrue();
});

it('cannot update password when confirmation does not match', function () {
    $user = User::factory()->create();

    livewire(ManageUsers::class)
        ->callTableAction('change_password', $user, data: [
            'password' => 'password',
            'password_confirmation' => 'secret-password'
        ])
        ->assertHasActionErrors();
});
