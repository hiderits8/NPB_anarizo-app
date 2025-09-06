<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;
use App\Models\PlayerGameAppearance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerGameStats>
 */
class PlayerGameStatsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $game = Game::query()->inRandomOrder()->first();
        $player = PlayerGameAppearance::query()->where('game_id', $game->game_id)->inRandomOrder()->first();

        return [
            'game_id'  => $game->game_id,
            'player_id' => $player->player_id,
            // 打撃
            'AB' => fake()->numberBetween(0, 6),
            'R'  => fake()->numberBetween(0, 4),
            'H'  => fake()->numberBetween(0, 5),
            'doubles' => fake()->numberBetween(0, 2),
            'triples' => fake()->numberBetween(0, 1),
            'HR'  => fake()->numberBetween(0, 2),
            'RBI' => fake()->numberBetween(0, 5),
            'SO' => fake()->numberBetween(0, 3),
            'BB' => fake()->numberBetween(0, 3),
            'HBP' => fake()->numberBetween(0, 1),
            'SacBunt' => 0,
            'SacFly'  => 0,
            'SB' => fake()->numberBetween(0, 2),
            'E'  => fake()->numberBetween(0, 1),
            // 投手
            'IP' => fake()->randomFloat(1, 0, 9),
            'Pitches' => fake()->numberBetween(0, 120),
            'BF' => fake()->numberBetween(0, 40),
            'H_allowed'  => fake()->numberBetween(0, 10),
            'HR_allowed' => fake()->numberBetween(0, 3),
            'K' => fake()->numberBetween(0, 12),
            'BB_given'  => fake()->numberBetween(0, 6),
            'HBP_given' => fake()->numberBetween(0, 2),
            'R_allowed' => fake()->numberBetween(0, 10),
            'ER' => fake()->numberBetween(0, 10),
            'W'  => 0,
            'L' => 0,
            'Holds' => 0,
            'SV' => 0,
            // Appearance集計
            'outs_recorded' => $player->outs_recorded,
        ];
    }
}
