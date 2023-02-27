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
            3 => [
                'name' => 'Bercegeay',
                'firstname' => 'Lucas',
                'login' => 'LBERCEGEAY',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => true,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => "Communication",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '31/05/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => '1',
                'picture' => null
            ],
            4 => [
                'name' => 'Moine',
                'firstname' => 'Jean Luc',
                'login' => 'JLMOINE',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Trésorerie",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '24/07/1962 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
            5 => [
                'name' => 'Cabanel',
                'firstname' => 'Cécile',
                'login' => 'CCABANEL',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Secrétaire",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '20/08/1973 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
            6 => [
                'name' => 'Guegan',
                'firstname' => 'Arnaud',
                'login' => 'AGUEGAN',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Référent Arbitre",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '24/01/1983 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
            7 => [
                'name' => 'Le Guen',
                'firstname' => 'Erwan',
                'login' => 'ELEGUEN',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '11/02/1976 00:00:00'),
                'coach_category' => '1',
                'player_category' => null,
                'picture' => null
            ],
            8 => [
                'name' => 'Bercegeay',
                'firstname' => 'Anthony',
                'login' => 'ABERCEGEAY',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '15/08/1975 00:00:00'),
                'coach_category' => '2',
                'player_category' => null,
                'picture' => null
            ],
            9 => [
                'name' => 'Robert',
                'firstname' => 'Guillaume',
                'login' => 'GROBERT',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '22/04/1998 00:00:00'),
                'coach_category' => '3',
                'player_category' => '1',
                'picture' => null
            ],
            10 => [
                'name' => 'Guiheneuf',
                'firstname' => 'Nicolas',
                'login' => 'NGUIHENEUF',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '22/04/1998 00:00:00'),
                'coach_category' => '4',
                'player_category' => null,
                'picture' => null
            ],
            11 => [
                'name' => 'Diorflar',
                'firstname' => 'Mickael',
                'login' => 'MDIORFLAR',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '22/02/1981 00:00:00'),
                'coach_category' => '5',
                'player_category' => null,
                'picture' => null
            ],
            12 => [
                'name' => 'Terrien',
                'firstname' => 'Pierre',
                'login' => 'PTERRIEN',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '06/01/1988 00:00:00'),
                'coach_category' => '6',
                'player_category' => null,
                'picture' => null
            ],
            13 => [
                'name' => 'Guiho',
                'firstname' => 'Carl',
                'login' => 'CGUIHO',
                'email' => null,
                'password' => null,
                'phone' => null,
                'is_actif' => false,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/11/1982 00:00:00'),
                'coach_category' => '7',
                'player_category' => null,
                'picture' => null
            ],
        ]);
    }
}
