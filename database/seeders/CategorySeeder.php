<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            0 => [
                'name' => 'Séniors',
                'has_drivers' => false,
                'has_shirts' => false,
                'has_cleaners' => true
            ],
            1 => [
                'name' => 'U17/U18',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            2 => [
                'name' => 'U14/U15',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            3 => [
                'name' => 'U12/U13',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            4 => [
                'name' => 'U10/U11',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            5 => [
                'name' => 'U8/U9',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            6 => [
                'name' => 'Ecole de foot',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
            7 => [
                'name' => 'Loisirs',
                'has_drivers' => true,
                'has_shirts' => true,
                'has_cleaners' => true
            ],
        ]);
    }
}
