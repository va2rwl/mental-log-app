<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyLog>
 */
class DailyLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'log_date' => now()->toDateString(),
            'mood' => $this->faker->numberBetween(0, 100),
            'sleep_start' => '22:00',
            'sleep_end' => '06:00',
            'meal_morning' => true,
            'meal_lunch' => false,
            'meal_dinner' => true,
            'meal_snack' => false,
            'activity' => '散歩した',
            'medication' => false,
            'journal' => $this->faker->sentence(),
        ];
    }
}
