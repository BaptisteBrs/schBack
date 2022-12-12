<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ConvocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convocation')->insert([
            0 => [
                'appointment' => '12h45',
                'game' => 1,
                'category' => 1,
                'team' => 1,
                'no_game' => false,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
            ],
            1 => [
                'appointment' => '13h15',
                'game' => 2,
                'category' => 1,
                'team' => 2,
                'no_game' => false,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
            ],
            3 => [
                'appointment' => '13h45',
                'game' => 1,
                'category' => 1,
                'team' => 1,
                'no_game' => false,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
            ],
            4 => [
                'appointment' => '13h15',
                'game' => null,
                'category' => 1,
                'team' => 2,
                'no_game' => true,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
            ],
            5 => [
                'appointment' => '12h45',
                'game' => null,
                'category' => 1,
                'team' => 3,
                'no_game' => true,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '09/12/2022 00:00:00'),
            ],
            6 => [
                'appointment' => '14h00',
                'game' => 5,
                'category' => 2,
                'team' => 5,
                'no_game' => false,
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
            ],
        ]);
    }
}
