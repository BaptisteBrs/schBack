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
            ]
        ]);
    }
}
