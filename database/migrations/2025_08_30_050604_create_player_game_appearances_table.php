<?php

use App\Models\Player;
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
        Schema::create('player_game_appearances', function (Blueprint $table) {
            $table->bigIncrements('appearance_id')->primary();
            $table->foreignId('game_id')->constrained(table: 'games', column: 'game_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->string('position', 20);

            $table->integer('start_inning');
            $table->integer('end_inning')->nullable();
            $table->integer('outs_recorded');

            $table->foreignId('roster_id')->constrained(table: 'rosters', column: 'roster_id');
            $table->timestamps();

            $table->unique(['game_id', 'player_id', 'start_inning']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_game_appearances');
    }
};
