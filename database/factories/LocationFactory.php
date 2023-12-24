<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => match (rand(1, 5)) {
                1 => 'Kitchen',
                2 => 'Basement',
                3 => 'Office',
                4 => 'Bedroom',
                5 => 'Living Room',
            },
        ];
    }
}
