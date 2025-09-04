<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roster>
 */
class RosterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-3 years', 'now');
        $season_year = (int) Carbon::instance($date)->format('Y');

        return [
            'player_id' => Player::factory(),
            'team_id' => Team::factory(),
            'season_year' => $season_year,
            'start_date' => $date,
            'end_date' => null,
            'uniform_number' => fake()->numberBetween(1, 99),
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
        ];
    }
}
