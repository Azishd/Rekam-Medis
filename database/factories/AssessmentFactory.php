<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datetime' => $this->faker->date('Y-m-d H:i:s'),
            'status' => $status = $this->faker->randomElement(['Healthy', 'Unhealthy', null]),
            'is_verified' => $status !== null ? 1 : 0,
            'is_finished' => 1,
            'notes' => $this->faker->paragraph(),
            'admin_id' => null,
        ];
    }
}
