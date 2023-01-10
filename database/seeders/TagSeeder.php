<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->insert([
            0 => [
                'name' => 'Séniors A',
            ],
            1 => [
                'name' => 'Séniors B',

            ],
            2 => [
                'name' => 'Séniors C',

            ],
            3 => [
                'name' => 'U18 A',

            ],
            4 => [
                'name' => 'U18 B',

            ],
            5 => [
                'name' => 'U15 A',

            ],
            6 => [
                'name' => 'U15 B',

            ],
            7 => [
                'name' => 'U13 A',

            ],
            8 => [
                'name' => 'U13 B',

            ],
            9 => [
                'name' => 'U11 A',

            ],
            10 => [
                'name' => 'U11 B',

            ],
            11 => [
                'name' => 'U9 A',

            ],
            12 => [
                'name' => 'U9 B',

            ],
            13 => [
                'name' => 'Ecole de foot',

            ],
            14 => [
                'name' => 'Loisirs',

            ],
            15 => [
                'name' => 'Bureau',

            ],
            16 => [
                'name' => 'Tous public',

            ],
            17 => [
                'name' => 'Arbitrage',

            ],
            18 => [
                'name' => 'Important',

            ],
        ]);
    }
}
