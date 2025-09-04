<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;
use App\Models\Player;
use App\Models\Team;

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
        $start = fake()->numberBetween(1, 9);
        $end = fake()->numberBetween($start, 9);
        $outs = ($end - $start + 1) * 3 - fake()->numberBetween(0, 2);

        return [
            'game_id' => Game::factory(),
            'player_id' => Player::factory(),
            'start_inning' => $start,
            'end_inning' => $end,
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
            'team_id' => Team::factory(),
            'outs_recorded' => $outs,
        ];
    }
}
