<?php

namespace Database\Seeders;

use Date;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            0 => [
                'name' => 'Boursin',
                'firstname' => 'Baptiste',
                'login' => 'BBOURSIN',
                'email' => 'baptiste.boursin@gmail.com',
                'password' => Hash::make("test"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => '1',
                'picture' => null
            ],
            1 => [
                'name' => 'Chatal',
                'firstname' => 'Sébastien',
                'login' => 'SCHATAL',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Président",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '08/09/1977 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
            2 => [
                'name' => 'Brisson',
                'firstname' => 'David',
                'login' => 'DBRISSON',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Président",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '05/03/1977 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
        ]);
    }
}
