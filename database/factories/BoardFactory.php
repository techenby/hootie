<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'token' => 'hootie',
            'tiles' => [],
        ];
    }
}
