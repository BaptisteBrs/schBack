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
                'login' => 'BBoursin',
                'email' => 'baptiste.boursin@gmail.com',
                'password' => Hash::make("#AdminSch!44410"),
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
                'login' => 'SChatal',
                'email' => 'sebastien.chatal@sch.com',
                'password' => Hash::make("SChatal.444"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => false,
                'bureau_fonction' => "Président",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => null,
                'picture' => null
            ],
            2 => [
                'name' => 'Letilly',
                'firstname' => 'Lilian',
                'login' => 'LLetilly',
                'email' => 'lilian.letilly@gmail.com',
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => true,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => 2,
                'player_category' => 1,
                'picture' => null
            ],
            3 => [
                'name' => 'Bercegeay',
                'firstname' => 'Lucas',
                'login' => 'LBercegeay',
                'email' => 'lucas.bercegeay@gmail.com',
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => "Communication",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            4 => [
                'name' => 'Legal',
                'firstname' => 'Jordan',
                'login' => 'JLegal',
                'email' => 'jordan.legal@gmail.com',
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => true,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => "Evenements",
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            5 => [
                'name' => 'Legouic',
                'firstname' => 'Rafaël',
                'login' => 'RLegouic',
                'email' => 'rafael.legouic@gmail.com',
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            6 => [
                'name' => 'Sable',
                'firstname' => 'Tristan',
                'login' => 'TSable',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            7 => [
                'name' => 'Lequitte',
                'firstname' => 'Yvan',
                'login' => 'YLequitte',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            8 => [
                'name' => 'Anderson',
                'firstname' => 'Sony',
                'login' => 'SAnderson',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            9 => [
                'name' => 'Clavier',
                'firstname' => 'Nicolas',
                'login' => 'NClavier',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            10 => [
                'name' => 'Mahe',
                'firstname' => 'Corentin',
                'login' => 'CMahe',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            11 => [
                'name' => 'Raimbaud',
                'firstname' => 'Kevin',
                'login' => 'KRaimbaud',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            12 => [
                'name' => 'Eonnet',
                'firstname' => 'Mathis',
                'login' => 'MEonnet',
                'email' => null,
                'password' => Hash::make("#user"),
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
            13 => [
                'name' => 'Leprovost',
                'firstname' => 'Florent',
                'login' => 'FLeprovost',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            14 => [
                'name' => 'Gourichon',
                'firstname' => 'Clement',
                'login' => 'GClement',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            15 => [
                'name' => 'Letournel',
                'firstname' => 'Gaetan',
                'login' => 'GLetournel',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            16 => [
                'name' => 'Pluquet',
                'firstname' => 'Lucas',
                'login' => 'LPluquet',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
            17 => [
                'name' => 'Acquitter',
                'firstname' => 'Damien',
                'login' => 'DAcquitter',
                'email' => null,
                'password' => Hash::make("#user"),
                'phone' => '0781995205',
                'is_actif' => true,
                'is_bureau' => false,
                'is_coach' => false,
                'is_benevole' => false,
                'is_player' => true,
                'bureau_fonction' => null,
                'birthday' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2000 00:00:00'),
                'coach_category' => null,
                'player_category' => 1,
                'picture' => null
            ],
        ]);
    }
}
