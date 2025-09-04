<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = [
            '読売ジャイアンツ',
            '東京ヤクルトスワローズ',
            '横浜DeNAベイスターズ',
            '中日ドラゴンズ',
            '阪神タイガース',
            '広島東洋カープ',
            '埼玉西武ライオンズ',
            '千葉ロッテマリーンズ',
            '東北楽天ゴールデンイーグルス',
            '北海道日本ハムファイターズ',
            '福岡ソフトバンクホークス',
            'オリックス・バファローズ',
            'オイシックス新潟アルビレックスBC',
            'くふうハヤテベンチャーズ静岡',
        ];

        foreach ($clubs as $club) {
            Club::firstOrCreate(['club_name' => $club]);
        }
    }
}
