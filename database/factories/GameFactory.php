<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\GameCategory;
use App\Models\Game;

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

        $home = Team::query()->inRandomOrder()->first()->team_id;
        $away = Team::query()->where('team_id', '!=', $home)->inRandomOrder()->first()->team_id;
        $stadium = Stadium::query()->inRandomOrder()->first()->stadium_id;
        $category = GameCategory::query()->inRandomOrder()->first()->category_id;

        $date = fake()->dateTimeBetween('-3 years', 'now');
        $season_year = (int) Carbon::instance($date)->format('Y');

        return [
            'season_year' => $season_year,
            'game_date' => $date,
            'stadium_id' => $stadium,
            'home_team_id' => $home,
            'away_team_id' => $away,
            'final_score_home' => fake()->numberBetween(0, 10),
            'final_score_away' => fake()->numberBetween(0, 10),
            'status' => fake()->randomElement(['scheduled', 'completed', 'cancelled']),
            'is_nighter' => fake()->boolean(),
            'category_id' => $category,
        ];
    }
}
