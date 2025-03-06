<?php
namespace Database\Factories;

use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Library::class;
    public function definition(): array
    {
        return [
            'title'       => fake()->sentence(),
            'description' => fake()->sentence(),
            'author'      => fake()->firstName(),
            'year'        => fake()->year(),
            'price'       => fake()->randomDigitNotZero(),
        ];
    }
}
