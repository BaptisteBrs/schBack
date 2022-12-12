<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            0 => [
                'name' => 'Séniors A',
                'league' => 'Division 2',
                'category' => 1
            ],
            1 => [
                'name' => 'Séniors B',
                'league' => 'Division 4',
                'category' => 1
            ],
            2 => [
                'name' => 'Séniors C',
                'league' => 'Division 5',
                'category' => 1
            ],
            3 => [
                'name' => 'U18 A',
                'league' => 'Division 2',
                'category' => 2
            ],
            4 => [
                'name' => 'U18 B',
                'league' => 'Division 4',
                'category' => 2
            ],
            5 => [
                'name' => 'U15 A',
                'league' => 'Division 2',
                'category' => 3
            ],
            6 => [
                'name' => 'U15 B',
                'league' => 'Division 4',
                'category' => 3
            ],
            7 => [
                'name' => 'U13 A',
                'league' => 'Division 2',
                'category' => 4
            ],
            8 => [
                'name' => 'U13 B',
                'league' => 'Division 4',
                'category' => 4
            ],
            9 => [
                'name' => 'U11 A',
                'league' => 'Division 2',
                'category' => 5
            ],
            10 => [
                'name' => 'U11 B',
                'league' => 'Division 4',
                'category' => 5
            ],
            11 => [
                'name' => 'U9 A',
                'league' => 'Division 2',
                'category' => 6
            ],
            12 => [
                'name' => 'U9 B',
                'league' => 'Division 4',
                'category' => 6
            ],
            14 => [
                'name' => 'Ecole de foot',
                'league' => null,
                'category' => 7
            ],
            14 => [
                'name' => 'Loisirs',
                'league' => null,
                'category' => 8
            ],

        ]);
    }
}
