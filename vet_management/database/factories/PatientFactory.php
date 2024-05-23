<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
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
        $species = $this->faker->randomElement(['Cat', 'Dog']);
        $owner = User::where('type', 'client')->inRandomOrder()->first();

        return [
            'name' => fake()->firstName(),
            'species' => $species,
            'breed' => fake()->word(),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'weight' => fake()->numberBetween(1, 30),
            'age' => fake()->numberBetween(1, 15),
            'owner_id' => $owner ? $owner->id : null,
        ];
    }
}
