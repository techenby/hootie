<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'yesterday_temp' => '50',
            'today_temp' => '30',
            'yesterday_weather' => 'sunny',
            'today_weather' => 'cloudy',
            'joint_pain' => 'moderate',
            'muscle_pain' => 'moderate',
            'took_meds' => true,
        ];
    }
}
