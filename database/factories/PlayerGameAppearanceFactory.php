<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;
use App\Models\Player;
use App\Models\Roster;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerGameAppearance>
 */
class PlayerGameAppearanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
            'player_id' => Player::factory(),
            'start_inning' => fake()->numberBetween(1, 9),
            'end_inning' => fake()->numberBetween(1, 9),
            'position' => fake()->randomElement([
                'P',
                'C',
                '1B',
                '2B',
                '3B',
                'SS',
                'LF',
                'CF',
                'RF',
            ]),
            'roster_id' => Roster::factory(),
            'outs_recorded' => fake()->numberBetween(0, 27),
        ];
    }
}
