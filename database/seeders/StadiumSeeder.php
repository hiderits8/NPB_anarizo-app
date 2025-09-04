<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stadium;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stadiums = [
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
        ];

        foreach ($stadiums as $stadium) {
            Stadium::firstOrCreate(['stadium_name' => $stadium]);
        }
    }
}
