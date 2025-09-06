<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GameCategory;

class GameCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Official', 'Interleague', 'CS', 'JapanSeries', 'Open', 'Farm'];

        foreach ($categories as $category) {
            GameCategory::firstOrCreate(['category_name' => $category]);
        }
    }
}
