<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PlayByPlay;
use App\Models\Player;
use App\Models\PlayerGameAppearance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubstitutionEvent>
 */
class SubstitutionEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pbp = PlayByPlay::query()
            ->where('event_type', 'substitution')
            ->inRandomOrder()
            ->first();

        if (!$pbp) {
            $pbp = PlayByPlay::factory()->create(['event_type' => 'substitution']);
        }

        $appearance = PlayerGameAppearance::query()
            ->where('game_id', $pbp->game_id)
            ->inRandomOrder()
            ->first();

        if (!$appearance) {
            $appearance = PlayerGameAppearance::factory()->create([
                'game_id' => $pbp->game_id,
            ]);
        }

        return [
            'pbp_id'        => $pbp->pbp_id,
            'from_position' => $this->faker->randomElement(['P', 'C', '1B', '2B', '3B', 'SS', 'LF', 'CF', 'RF', 'DH', 'Bench']),
            'to_position'   => $this->faker->randomElement(['P', 'C', '1B', '2B', '3B', 'SS', 'LF', 'CF', 'RF', 'DH']),
            'player_id'     => $appearance->player_id,
            'appearance_id' => $appearance->appearance_id,
        ];
    }
}
