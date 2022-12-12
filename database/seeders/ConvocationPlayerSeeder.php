<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ConvocationPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convocation_player')->insert([
            0 => [
                'player' => 1,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => true
            ],
            1 => [
                'player' => 3,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            2 => [
                'player' => 4,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            3 => [
                'player' => 5,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            4 => [
                'player' => 6,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            5 => [
                'player' => 7,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            6 => [
                'player' => 8,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            7 => [
                'player' => 9,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            8 => [
                'player' => 10,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            9 => [
                'player' => 11,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            10 => [
                'player' => 12,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            11 => [
                'player' => 13,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => true
            ],
            12 => [
                'player' => 14,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            13 => [
                'player' => 15,
                'convocation' => 1,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            14 => [
                'player' => 1,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => true
            ],
            15 => [
                'player' => 3,
                'convocation' => 6,
                'is_driver' => true,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            16 => [
                'player' => 4,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            17 => [
                'player' => 5,
                'convocation' => 6,
                'is_driver' => true,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            18 => [
                'player' => 6,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            19 => [
                'player' => 7,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            20 => [
                'player' => 8,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            21 => [
                'player' => 9,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            22 => [
                'player' => 10,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            23 => [
                'player' => 11,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            24 => [
                'player' => 12,
                'convocation' => 1,
                'is_driver' => true,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
            25 => [
                'player' => 13,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => true
            ],
            26 => [
                'player' => 14,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => true,
                'is_cleaner' => null
            ],
            27 => [
                'player' => 15,
                'convocation' => 6,
                'is_driver' => null,
                'is_shirt' => null,
                'is_cleaner' => null
            ],
        ]);
    }
}
