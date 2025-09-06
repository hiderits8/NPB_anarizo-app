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
        Schema::create('error_events', function (Blueprint $table) {
            $table->bigIncrements('event_id')->primary();
            $table->foreignId('pbp_id')->constrained(table: 'play_by_plays', column: 'pbp_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->string('defensive_position', 20);
            $table->string('error_context', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('error_events');
    }
};
