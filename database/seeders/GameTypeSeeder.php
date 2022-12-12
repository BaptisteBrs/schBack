<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_type')->insert([
            0 => [
                'name' => 'Amical',
                'icon' => '🤝'
            ],
            1 => [
                'name' => 'Championnat',
                'icon' => '🥇'
            ],
            2 => [
                'name' => 'Coupe',
                'icon' => '🏆'
            ],
        ]);
    }
}
