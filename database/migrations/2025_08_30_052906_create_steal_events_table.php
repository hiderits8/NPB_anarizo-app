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
        Schema::create('steal_events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->foreignId('pbp_id')->constrained(table: 'play_by_plays', column: 'pbp_id');
            $table->foreignId('runner_id')->constrained(table: 'players', column: 'player_id');
            $table->tinyInteger('attempted_base');
            $table->boolean('steal_success');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steal_events');
    }
};
