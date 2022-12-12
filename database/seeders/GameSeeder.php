<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game')->insert([
            0 => [
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
                'place' => 'Exterieur',
                'opponent' => 'St Lyphard',
                'sch_goals' => '0',
                'opponent_goals' => '0',
                'team' => 1,
                'type' => 3,
                'hour' => '15h00',
                'comment' => null,
                'is_home' => false,
                'is_finish' => false,
                'is_win' => null,
                'is_lose' => null,
                'is_draw' => null,

            ],
            1 => [
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
                'place' => 'Domicile',
                'opponent' => 'St Lyphard',
                'sch_goals' => '0',
                'opponent_goals' => '0',
                'team' => 2,
                'type' => 3,
                'hour' => '15h00',
                'comment' => null,
                'is_home' => true,
                'is_finish' => false,
                'is_win' => null,
                'is_lose' => null,
                'is_draw' => null,

            ],
            2 => [
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
                'place' => 'Exterieur',
                'opponent' => 'St Lyphard',
                'sch_goals' => '0',
                'opponent_goals' => '0',
                'team' => 3,
                'type' => 3,
                'hour' => '13h00',
                'comment' => null,
                'is_home' => false,
                'is_finish' => false,
                'is_win' => null,
                'is_lose' => null,
                'is_draw' => null,

            ],
            3 => [
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'place' => 'Domicile',
                'opponent' => 'St Lyphard',
                'sch_goals' => '0',
                'opponent_goals' => '0',
                'team' => 3,
                'type' => 3,
                'hour' => '13h00',
                'comment' => null,
                'is_home' => false,
                'is_finish' => false,
                'is_win' => null,
                'is_lose' => null,
                'is_draw' => null,
            ],
            4 => [
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/12/2022 00:00:00'),
                'place' => 'Exterieur',
                'opponent' => 'St Lyphard',
                'sch_goals' => '0',
                'opponent_goals' => '0',
                'team' => 5,
                'type' => 1,
                'hour' => '16h00',
                'comment' => null,
                'is_home' => false,
                'is_finish' => false,
                'is_win' => null,
                'is_lose' => null,
                'is_draw' => null,
            ]
        ]);
    }
}
