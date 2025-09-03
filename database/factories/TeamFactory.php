<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_name' => fake()->randomElement([
                '読売ジャイアンツ',
                '阪神タイガース',
                '中日ドラゴンズ',
                '広島東洋カープ',
                '北海道日本ハムファイターズ',
                '東京ヤクルトスワローズ',
                'オリックス・バファローズ',
                '埼玉西武ライオンズ',
                '福岡ソフトバンクホークス',
                '東北楽天イーグルス',
                '千葉ロッテマリーンズ',
                '横浜DeNAベイスターズ',
            ]),
            'league' => fake()->randomElement([
                'Central',
                'Pacific',
            ]),
        ];
    }
}
