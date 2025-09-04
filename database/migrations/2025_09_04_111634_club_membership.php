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
        Schema::create('club_memberships', function (Blueprint $table) {
            $table->bigIncrements('membership_id')->primary();
            $table->foreignId('club_id')->constrained(table: 'clubs', column: 'club_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('uniform_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
