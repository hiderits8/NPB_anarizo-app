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
        Schema::create('substitution_events', function (Blueprint $table) {
            $table->bigIncrements('event_id')->primary();
            $table->foreignId('pbp_id')->constrained(table: 'play_by_plays', column: 'pbp_id');
            $table->string('from_position', 20);
            $table->string('to_position', 20);
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->foreignId('appearance_id')->constrained(table: 'player_game_appearances', column: 'appearance_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('substitution_events');
    }
};
