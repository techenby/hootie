<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use App\Models\User;
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

        Location::factory()->createMany([
            ['name' => 'Basement'],
            ['name' => 'Master Bedroom Closet'],
            ['name' => 'Living Room'],
            ['name' => 'Workshop'],
            ['name' => 'Garage'],
        ]);
    }
}
