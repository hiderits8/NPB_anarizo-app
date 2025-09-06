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
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('game_id')->primary();
            $table->integer('season_year');
            $table->date('game_date');

            $table->foreignId('stadium_id')->constrained(table: 'stadiums', column: 'stadium_id');
            $table->foreignId('home_team_id')->constrained(table: 'teams', column: 'team_id');
            $table->foreignId('away_team_id')->constrained(table: 'teams', column: 'team_id');
            $table->integer('final_score_home');
            $table->integer('final_score_away');
            $table->string('status', 100);
            $table->boolean('is_nighter')->default(true);
            $table->foreignId('category_id')->constrained(table: 'game_categories', column: 'category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
