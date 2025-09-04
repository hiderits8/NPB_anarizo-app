<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'club_name' => fake()->unique()->randomElement([
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
            ]),
        ];
    }
}
