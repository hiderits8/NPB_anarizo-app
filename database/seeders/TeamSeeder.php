<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $map = [
            '読売ジャイアンツ' => ['Central', 'Eastern'],
            '横浜DeNAベイスターズ' => ['Central', 'Eastern'],
            '阪神タイガース' => ['Central', 'Western'],
            '中日ドラゴンズ' => ['Central', 'Western'],
            '広島東洋カープ' => ['Central', 'Western'],
            '東京ヤクルトスワローズ' => ['Central', 'Eastern'],
            'オリックス・バファローズ' => ['Pacific', 'Western'],
            '福岡ソフトバンクホークス' => ['Pacific', 'Western'],
            '千葉ロッテマリーンズ' => ['Pacific', 'Eastern'],
            '埼玉西武ライオンズ' => ['Pacific', 'Eastern'],
            '東北楽天ゴールデンイーグルス' => ['Pacific', 'Eastern'],
            '北海道日本ハムファイターズ' => ['Pacific', 'Eastern'],
            'オイシックス新潟アルビレックスBC' => [null, 'Eastern'],
            'くふうハヤテベンチャーズ静岡' => [null, 'Western'],
        ];


        foreach ($map as $clubName => $levels) {
            $club = Club::where('club_name', $clubName)->firstOrFail();

            $leagueTop = $levels[0];
            $leagueFarm = $levels[1];

            if ($leagueTop !== null) {
                Team::firstOrCreate([
                    'club_id' => $club->club_id,
                    'team_name' => $clubName . '（一軍）',
                ], [
                    'league' => $levels[0],
                    'level'  => 'First',
                ]);
            }

            if ($leagueFarm !== null) {
                Team::firstOrCreate([
                    'club_id' => $club->club_id,
                    'team_name' => $clubName . '（ファーム）',
                ], [
                    'league' => $leagueFarm,
                    'level'  => 'Farm',
                ]);
            }
        }
    }
}
