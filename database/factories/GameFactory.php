<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'season_year' => fake()->year(),
            'game_date' => fake()->date(),
            'stadium_id' => Stadium::factory(),
            'home_team_id' => Team::factory(),
            'away_team_id' => Team::factory(),
            'final_score_home' => fake()->numberBetween(0, 10),
            'final_score_away' => fake()->numberBetween(0, 10),
            'status' => fake()->randomElement([
                '未開催',
                '試合中',
                '試合終了',
            ]),
            'is_nighter' => fake()->boolean(),
            'category_id' => GameCategory::factory(),
        ];
    }
}
