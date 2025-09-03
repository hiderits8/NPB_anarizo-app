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
        Schema::create('player_name_histories', function (Blueprint $table) {
            $table->increments('history_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->string('name', 100);
            $table->string('name_type', 20);
            $table->date('effective_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_name_histories');
    }
};
