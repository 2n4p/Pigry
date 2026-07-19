<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
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
            'date' => fake()->dateTimeBetween('2026-01-01', '2026-12-31'),
            'weight' => fake()->randomFloat(1,40,120),
            'calories' => fake()->randomNumber(4,true),
            'exercise_time' => fake()->date('H:i'),
            'exercise_content' => fake()->randomElement(['ジム','ランニング','ストレッチ']),
        ];
    }
}
