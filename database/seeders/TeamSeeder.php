<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $teams = [
            // セ・リーグ
            ['team_name' => '読売ジャイアンツ',   'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '東京ヤクルトスワローズ', 'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '横浜DeNAベイスターズ',   'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '中日ドラゴンズ',       'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '阪神タイガース',       'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '広島東洋カープ',       'league' => 'Central', 'created_at' => $now, 'updated_at' => $now],

            // パ・リーグ
            ['team_name' => '埼玉西武ライオンズ',   'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '千葉ロッテマリーンズ',   'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '東北楽天ゴールデンイーグルス', 'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '北海道日本ハムファイターズ',   'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => '福岡ソフトバンクホークス',     'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
            ['team_name' => 'オリックス・バファローズ',     'league' => 'Pacific', 'created_at' => $now, 'updated_at' => $now],
        ];

        // team_name を一意キーとして upsert
        DB::table('teams')->upsert(
            $teams,
            uniqueBy: ['team_name'],
            update: ['league', 'updated_at']
        );
    }
}
