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
        Schema::create('pitch_events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->foreignId('pbp_id')->constrained(table: 'play_by_plays', column: 'pbp_id')->unique();
            $table->foreignId('pitcher_id')->constrained(table: 'players', column: 'player_id');
            $table->foreignId('batter_id')->constrained(table: 'players', column: 'player_id');

            $table->integer('pitch_velocity');
            $table->string('pitch_type', 50);
            $table->float('pitch_location_x');
            $table->float('pitch_location_y');

            $table->boolean('swing');
            $table->tinyInteger('hit_bases');
            $table->boolean('contact_made');

            $table->string('pitcher_hand', 10);
            $table->string('batter_hand', 10);

            $table->integer('pitch_count_in_inning');
            $table->integer('pitch_count_in_game');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitch_events');
    }
};
