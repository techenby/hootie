<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thing>
 */
class ThingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => match(rand(1,5)) {
                1 => 'Microphone',
                2 => 'Cookie Cutter',
                3 => 'Controller',
                4 => 'Puzzle',
                5 => 'Ornament',
            },
        ];
    }
}
