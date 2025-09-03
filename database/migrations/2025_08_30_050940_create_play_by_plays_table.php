<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('play_by_plays', function (Blueprint $table) {
            $table->increments('pbp_id');
            $table->foreignId('game_id')->constrained(table: 'games', column: 'game_id');
            $table->integer('inning');
            $table->string('top_bottom', 1);
            $table->integer('pbp_sequence');
            $table->integer('anchor_pitch_sequence');

            $table->tinyInteger('count_b');
            $table->tinyInteger('count_s');
            $table->tinyInteger('count_o');

            $table->foreignId('batting_player_id')->constrained(table: 'players', column: 'player_id')->nullable();
            $table->foreignId('pitching_player_id')->constrained(table: 'players', column: 'player_id')->nullable();
            $table->foreignId('runner_first_id')->constrained(table: 'players', column: 'player_id')->nullable();
            $table->foreignId('runner_second_id')->constrained(table: 'players', column: 'player_id')->nullable();
            $table->foreignId('runner_third_id')->constrained(table: 'players', column: 'player_id')->nullable();

            $table->string('event_type', 50);
            $table->timestamps();

            $table->unique(['game_id', 'inning', 'top_bottom', 'pbp_sequence']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('play_by_plays');
    }
};
