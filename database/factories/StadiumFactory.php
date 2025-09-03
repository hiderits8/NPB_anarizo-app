<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stadium_name' => fake()->randomElement([
                '東京ドーム',
                '阪神甲子園球場',
                'バンテリンドーム ナゴヤ',
                'MAZDA Zoom-Zoom スタジアム広島',
                'エスコンフィールドHOKKAIDO',
                '明治神宮野球場',
                '京セラドーム大阪',
                'ベルーナドーム',
                'みずほPayPayドーム福岡',
                '楽天モバイルパーク宮城',
                'ZOZOマリンスタジアム',
                '横浜スタジアム',
            ]),
            'is_dome' => fake()->boolean(),
        ];
    }
}
