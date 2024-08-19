<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Board;
use App\Models\Envelope;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Andy Newhouse',
            'email' => 'hi@andymnewhouse.me',
        ]);

        // Inventory
        Location::factory()->createMany([
            ['name' => 'Basement'],
            ['name' => 'Master Bedroom Closet'],
            ['name' => 'Living Room'],
            ['name' => 'Workshop'],
            ['name' => 'Garage'],
        ]);

        // Boards
        Board::factory()->create([
            'name' => 'Andy\'s Board',
            'tiles' => [
                [
                    'data' => [
                        'type' => 'blade',
                        'width' => 1,
                        'height' => 1,
                        'timezone' => 'America/Chicago',
                    ],
                    'type' => 'clock-analog',
                ],
                [
                    'data' => [
                        'type' => 'blade',
                        'width' => 1,
                        'height' => 1,
                        'timezone' => 'America/Chicago',
                    ],
                    'type' => 'clock-digital',
                ],
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
                [
                    'data' => [
                        'type' => 'livewire',
                        'width' => 1,
                        'height' => 1,
                        'timezone' => 'America/Chicago',
                    ],
                    'type' => 'monthly-calendar',
                ],
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
                [
                    'data' => [
                        'name' => 'Andy',
                        'type' => 'livewire',
                        'width' => 1,
                        'emails' => [
                            'andy.newhouse@tighten.co',
                            'andymnewhouse@gmail.com',
                            'andy@sgdinstitute.org',
                        ],
                        'height' => 1,
                    ],
                    'type' => 'agenda-calendar',
                ],
            ],
        ]);

        // Snails
        Account::factory()->count(4)
            ->state(new Sequence(
                ['name' => 'Checking', 'institution' => 'Bank'],
                ['name' => 'Savings', 'institution' => 'Bank', 'interest' => 1.5],
            ))
            ->create(['type' => 'asset']);
        Account::factory()->count(3)
            ->state(new Sequence(
                ['name' => 'Travel Card', 'institution' => 'Airline', 'interest' => 25],
                ['name' => 'Bank Card', 'institution' => 'Bank', 'interest' => 29],
                ['name' => 'Loan', 'institution' => 'Bank', 'interest' => 5],
            ))
            ->create(['type' => 'liability']);

        Envelope::factory()->count(3)
            ->state(new Sequence(
                ['name' => 'Groceries'],
                ['name' => 'Utilities'],
                ['name' => 'Rent'],
                ['name' => 'Fun'],
            ))
            ->create();
    }
}
