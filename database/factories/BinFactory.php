<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bin>
 */
class BinFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => match (rand(1, 5)) {
                1 => 'Tech',
                2 => 'Memories',
                3 => 'Sport',
                4 => 'Camping',
                5 => 'Christmas',
            },
        ];
    }
}
