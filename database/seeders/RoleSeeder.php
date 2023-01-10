<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            0 => [
                'name' => 'admin',
                'title' => 'Admin'
            ],
            1 => [
                'name' => 'coach',
                'title' => 'Coach'
            ],
            2 => [
                'name' => 'bureau',
                'title' => 'Bureau'
            ],
            3 => [
                'name' => 'benevole',
                'title' => 'Benevole'
            ],
            4 => [
                'name' => 'user',
                'title' => 'User'
            ],
            5 => [
                'name' => 'coach_bureau',
                'title' => 'Coach_Bureau'
            ],
            6 => [
                'name' => 'coach_benevole',
                'title' => 'Coach_Benevole'
            ],
            7 => [
                'name' => 'bureau_benevole',
                'title' => 'Bureau_Benevole'
            ],
            8 => [
                'name' => 'bureau_coach_benevole',
                'title' => 'Bureau_Coach_Benevole'
            ]

        ]);
    }
}
