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
                'name' => 'Baptiste',
                'firstname' => 'Boursin',
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
                'player_category' => '1'
            ]
        ]);
    }
}
