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
        Schema::create('advancement_events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->foreignId('pbp_id')->constrained(table: 'play_by_plays', column: 'pbp_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->tinyInteger('from_base');
            $table->tinyInteger('to_base');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advancement_events');
    }
};
