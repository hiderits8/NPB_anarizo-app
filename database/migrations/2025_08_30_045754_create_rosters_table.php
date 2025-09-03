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
        Schema::create('rosters', function (Blueprint $table) {
            $table->increments('roster_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->foreignId('team_id')->constrained(table: 'teams', column: 'team_id');
            $table->integer('season_year');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('uniform_number');
            $table->string('position', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rosters');
    }
};
