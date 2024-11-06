<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phone = $this->faker->phoneNumber();
        $phone = str_replace([' ', '(', ')', '+'], '', $phone);
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'firstname' => $this->faker->firstName($gender = $this->faker->randomElement(['male', 'female'])),
            'lastname' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'phone' => $phone,
            'gender' => $gender,
            'age' => mt_rand(20, 70),
            'admin_id' => null
        ];
    }
}
