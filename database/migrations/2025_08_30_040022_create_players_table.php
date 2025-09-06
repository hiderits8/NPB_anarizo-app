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
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('player_id')->primary();
            $table->string('official_name', 100);
            $table->string('display_name', 100);
            $table->string('english_name', 100);
            $table->date('date_of_birth');
            $table->unsignedSmallInteger('height');
            $table->unsignedSmallInteger('weight');
            $table->boolean('throws_left')->default(false);
            $table->boolean('throws_right')->default(false);
            $table->boolean('bats_left')->default(false);
            $table->boolean('bats_right')->default(false);
            $table->timestamps();

            $table->index('official_name');
            $table->index('display_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
