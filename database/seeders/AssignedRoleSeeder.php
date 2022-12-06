<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignedRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assigned_roles')->insert([
            0 => [
                'role_id' => '1',
                'entity_id' => '1',
                'entity_type' => User::class
            ]
        ]);
    }
}
