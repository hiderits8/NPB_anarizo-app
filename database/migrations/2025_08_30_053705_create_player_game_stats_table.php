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
        Schema::create('player_game_stats', function (Blueprint $table) {
            $table->increments('stats_id');
            $table->foreignId('player_id')->constrained(table: 'players', column: 'player_id');
            $table->foreignId('game_id')->constrained(table: 'games', column: 'game_id');

            // --- Batting Stats ---
            $table->integer('AB')->default(0);                    // 打数 (At Bats)
            $table->integer('R')->default(0);                     // 得点 (Runs)
            $table->integer('H')->default(0);                     // 安打 (Hits)
            $table->integer('doubles')->default(0);               // 二塁打 (Doubles)
            $table->integer('triples')->default(0);               // 三塁打 (Triples)
            $table->integer('HR')->default(0);                    // 本塁打 (Home Runs)
            $table->integer('RBI')->default(0);                   // 打点 (Runs Batted In)
            $table->integer('SO')->default(0);                    // 三振 (Strikeouts, batting)
            $table->integer('BB')->default(0);                    // 四球 (Walks)
            $table->integer('HBP')->default(0);                   // 死球 (Hit By Pitch)
            $table->integer('SacBunt')->default(0);               // 犠打 (Sacrifice Bunts)
            $table->integer('SacFly')->default(0);                // 犠飛 (Sacrifice Flies)
            $table->integer('SB')->default(0);                    // 盗塁 (Stolen Bases)
            $table->integer('E')->default(0);                     // 失策 (Errors)

            // --- Pitching Stats ---
            $table->float('IP')->default(0);                      // 投球回数 (Innings Pitched)
            $table->integer('Pitches')->default(0);               // 投球数 (Total Pitches)
            $table->integer('BF')->default(0);                    // 対戦打者数 (Batters Faced)
            $table->integer('H_allowed')->default(0);             // 被安打数 (Hits Allowed)
            $table->integer('HR_allowed')->default(0);            // 被本塁打数 (Home Runs Allowed)
            $table->integer('K')->default(0);                     // 奪三振 (Strikeouts, pitching)
            $table->integer('BB_given')->default(0);              // 与四球数 (Walks Given)
            $table->integer('HBP_given')->default(0);             // 与死球数 (Hit By Pitch Given)
            $table->integer('R_allowed')->default(0);             // 失点 (Runs Allowed)
            $table->integer('ER')->default(0);                    // 自責点 (Earned Runs)
            $table->integer('W')->default(0);                     // 勝利数 (Wins)
            $table->integer('L')->default(0);                     // 敗戦数 (Losses)
            $table->integer('Holds')->default(0);                 // ホールド数 (Holds)
            $table->integer('SV')->default(0);                    // セーブ数 (Saves)

            // --- Appearance ---
            $table->integer('outs_recorded')->default(0);           // 出場アウト数（PlayerGameAppearance集計値->3で除してInningsPlayedにする）

            $table->timestamps();

            $table->unique(['game_id', 'player_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_game_stats');
    }
};
