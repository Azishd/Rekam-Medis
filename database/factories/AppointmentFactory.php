<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datetime' => $this->faker->dateTimeBetween('2024-01-01 00:00:00', '2024-12-31 23:59:59')->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement(['waiting', 'rejected', 'accepted']),
            'admin_id' => null,
        ];
    }
}
