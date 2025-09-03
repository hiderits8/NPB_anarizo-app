<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'official_name' => fake()->name(),
            'display_name' => fake()->name(),
            'english_name' => fake()->locale('en_US')->name(),
            'date_of_birth' => fake()->date(),
            'height' => fake()->numberBetween(160, 200),
            'weight' => fake()->numberBetween(60, 100),
            'throws_left' => fake()->boolean(),
            'throws_right' => fake()->boolean(),
            'bats_left' => fake()->boolean(),
            'bats_right' => fake()->boolean(),
        ];
    }
}
