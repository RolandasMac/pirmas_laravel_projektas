<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crud>
 */
class CrudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'   => fake()->firstName(),
            'lastName'    => fake()->lastName(),
            'birthDate'   => fake()->date(),
            'phone'       => fake()->phoneNumber(),
            'email'       => fake()->email(),
            'bankAccount' => fake()->biasedNumberBetween(),
        ];
    }
}
