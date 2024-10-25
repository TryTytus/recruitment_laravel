<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isBorrowed = fake()->boolean();

        return [
            'title' => fake()->sentence(),
            'author'=> fake()->name(),
            'published_year' => fake()->year(),
            'publisher' => fake()->company(),
            'is_borrowed' => $isBorrowed,
            'client_id' => ($isBorrowed) ? fake()->numberBetween(1, 20) : null
        ];
    }
}
