<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Bouncer;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        // DB::table('permissions')->insert([
        //     // 0 => [
        //     //     'ability_id' => '1',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 1 => [
        //     //     'ability_id' => '2',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 2 => [
        //     //     'ability_id' => '3',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 3 => [
        //     //     'ability_id' => '4',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 4 => [
        //     //     'ability_id' => '5',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 5 => [
        //     //     'ability_id' => '6',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 6 => [
        //     //     'ability_id' => '7',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 7 => [
        //     //     'ability_id' => '8',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 8 => [
        //     //     'ability_id' => '9',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 9 => [
        //     //     'ability_id' => '10',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 10 => [
        //     //     'ability_id' => '11',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 11 => [
        //     //     'ability_id' => '12',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 12 => [
        //     //     'ability_id' => '13',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 13 => [
        //     //     'ability_id' => '14',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 14 => [
        //     //     'ability_id' => '15',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 15 => [
        //     //     'ability_id' => '16',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 16 => [
        //     //     'ability_id' => '17',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 17 => [
        //     //     'ability_id' => '18',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 18 => [
        //     //     'ability_id' => '19',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 19 => [
        //     //     'ability_id' => '20',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 20 => [
        //     //     'ability_id' => '21',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 21 => [
        //     //     'ability_id' => '22',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 22 => [
        //     //     'ability_id' => '23',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 23 => [
        //     //     'ability_id' => '24',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 24 => [
        //     //     'ability_id' => '25',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 25 => [
        //     //     'ability_id' => '26',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 26 => [
        //     //     'ability_id' => '27',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 27 => [
        //     //     'ability_id' => '28',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 28 => [
        //     //     'ability_id' => '29',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 29 => [
        //     //     'ability_id' => '30',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 30 => [
        //     //     'ability_id' => '31',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 31 => [
        //     //     'ability_id' => '32',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 32 => [
        //     //     'ability_id' => '33',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 33 => [
        //     //     'ability_id' => '34',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 34 => [
        //     //     'ability_id' => '35',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 35 => [
        //     //     'ability_id' => '36',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 36 => [
        //     //     'ability_id' => '37',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 37 => [
        //     //     'ability_id' => '38',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 38 => [
        //     //     'ability_id' => '39',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 39 => [
        //     //     'ability_id' => '40',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 40 => [
        //     //     'ability_id' => '41',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 41 => [
        //     //     'ability_id' => '42',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 42 => [
        //     //     'ability_id' => '43',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 43 => [
        //     //     'ability_id' => '44',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 44 => [
        //     //     'ability_id' => '45',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 45 => [
        //     //     'ability_id' => '46',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 46 => [
        //     //     'ability_id' => '47',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 47 => [
        //     //     'ability_id' => '48',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 48 => [
        //     //     'ability_id' => '49',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 49 => [
        //     //     'ability_id' => '50',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 50 => [
        //     //     'ability_id' => '51',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 51 => [
        //     //     'ability_id' => '52',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 52 => [
        //     //     'ability_id' => '53',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 53 => [
        //     //     'ability_id' => '54',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 54 => [
        //     //     'ability_id' => '55',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],
        //     // 55 => [
        //     //     'ability_id' => '56',
        //     //     'entity_id' => '1',
        //     //     'entity_type' => Role::class
        //     // ],

        // ]);
    }
}
