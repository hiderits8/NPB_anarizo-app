<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;
use App\Models\Player;
use App\Models\PlayerGameAppearance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayByPlay>
 */
class PlayByPlayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $game = Game::query()->inRandomOrder()->first() ?? Game::factory()->create();
        $inning = $this->faker->numberBetween(1, 9);
        $topBottom = $this->faker->randomElement(['T', 'B']);
        $eventType = $this->faker->randomElement([
            'pitch',
            'advancement',
            'steal',
            'error',
            'other',
            'substitution'
        ]);
        $battingTeamId = $topBottom === 'T' ? $game->away_team_id : $game->home_team_id;
        $fieldingTeamId = $topBottom === 'T' ? $game->home_team_id : $game->away_team_id;

        $batterAppearance = PlayerGameAppearance::query()
            ->where('game_id', $game->game_id)
            ->where('team_id', $battingTeamId)
            ->inRandomOrder()->first();

        if (!$batterAppearance) {
            $batterPlayer = Player::query()->inRandomOrder()->first() ?? Player::factory()->create();
            $batterAppearance = PlayerGameAppearance::factory()->create([
                'game_id' => $game->game_id,
                'player_id' => $batterPlayer->player_id,
                'team_id' => $battingTeamId,
                'position' => $this->faker->randomElement(['C', '1B', '2B', '3B', 'SS', 'LF', 'CF', 'RF', 'DH',]),
                'start_inning' => 1,
                'end_inning' => 9,
                'outs_recorded' => 27,
            ]);
        }

        $pitcherAppearance = PlayerGameAppearance::query()
            ->where('game_id', $game->game_id)
            ->where('team_id', $fieldingTeamId)
            ->where('position', 'P')
            ->inRandomOrder()->first();

        if (!$pitcherAppearance) {
            $pitcherPlayer = Player::query()->inRandomOrder()->first() ?? Player::factory()->create();
            $pitcherAppearance = PlayerGameAppearance::factory()->create([
                'game_id' => $game->game_id,
                'player_id' => $pitcherPlayer->player_id,
                'team_id' => $fieldingTeamId,
                'position' => 'P',
                'start_inning' => 1,
                'end_inning' => 9,
                'outs_recorded' => 27,
            ]);
        }


        return [
            'game_id'       => $game->game_id,
            'inning'        => $inning,
            'top_bottom'    => $topBottom,
            'pbp_sequence'  => fake()->numberBetween(1, 300),
            'anchor_pitch_sequence' => fake()->numberBetween(0, 140),
            'count_b'       => fake()->numberBetween(0, 3),
            'count_s'       => fake()->numberBetween(0, 2),
            'count_o'       => fake()->numberBetween(0, 2),
            'batter_id'     => $batterAppearance->player_id,
            'pitcher_id'     => $pitcherAppearance->player_id,
            'runner_first_id'  => null,
            'runner_second_id' => null,
            'runner_third_id'  => null,
            'event_type'    => fake()->randomElement(['pitch', 'steal', 'error', 'advancement', 'substitution', 'other',]),
        ];
    }
}
