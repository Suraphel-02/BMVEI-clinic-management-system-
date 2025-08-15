<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Abebe', 'Kebede', 'Chala', 'Tigist', 'Aster', 'Mekdes', 'Solomon', 'Dawit', 'Sara', 'Lelisa']),
            'lastname' => $this->faker->randomElement(['Kebede', 'Abebe', 'Lemma', 'Tadesse', 'Bekele', 'Desta', 'Fikru', 'Girma', 'Haile', 'Mamo']),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'medical_history' => fake()->sentence(),
            'dob' => fake()->date('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'diseases' => fake()->sentence(),
            'allergies' => fake()->sentence(),

            'comments' => fake()->paragraph(),
        ];
    }
}
