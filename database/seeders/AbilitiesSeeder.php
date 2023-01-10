<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Silber\Bouncer\Bouncer;

class AbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abilities')->insert([
            0 => [
                'name' => 'view_users',
                'title' => 'View users',
            ],
            1 => [
                'name' => 'store_users',
                'title' => 'Store users',
            ],
            2 => [
                'name' => 'update_user',
                'title' => 'Update users',
            ],
            3 => [
                'name' => 'delete_user',
                'title' => 'Delete users',
            ],
            4 => [
                'name' => 'view_teams',
                'title' => 'View teams',
            ],
            5 => [
                'name' => 'store_teams',
                'title' => 'Store teams',
            ],
            6 => [
                'name' => 'update_teams',
                'title' => 'Update teams',
            ],
            7 => [
                'name' => 'delete_teams',
                'title' => 'Delete teams',
            ],
            8 => [
                'name' => 'view_tags',
                'title' => 'View tags',
            ],
            9 => [
                'name' => 'store_tags',
                'title' => 'Store tags',
            ],
            10 => [
                'name' => 'update_tags',
                'title' => 'Update tags',
            ],
            11 => [
                'name' => 'delete_tags',
                'title' => 'Delete tags',
            ],
            12 => [
                'name' => 'view_partenaires',
                'title' => 'View partenaires',
            ],
            13 => [
                'name' => 'store_partenaires',
                'title' => 'Store partenaires',
            ],
            14 => [
                'name' => 'update_partenaires',
                'title' => 'Update partenaires',
            ],
            15 => [
                'name' => 'delete_partenaires',
                'title' => 'Delete partenaires',
            ],
            16 => [
                'name' => 'view_game_types',
                'title' => 'View games types',
            ],
            17 => [
                'name' => 'store_game_types',
                'title' => 'Store games types',
            ],
            18 => [
                'name' => 'update_game_types',
                'title' => 'Update games types',
            ],
            19 => [
                'name' => 'delete_game_types',
                'title' => 'Delete games types',
            ],
            20 => [
                'name' => 'view_games',
                'title' => 'View games',
            ],
            21 => [
                'name' => 'store_games',
                'title' => 'Store games ',
            ],
            22 => [
                'name' => 'update_games',
                'title' => 'Update games ',
            ],
            23 => [
                'name' => 'delete_games',
                'title' => 'Delete games',
            ],
            24 => [
                'name' => 'view_convocations',
                'title' => 'View convocations',
            ],
            25 => [
                'name' => 'store_convocations',
                'title' => 'Store convocations ',
            ],
            26 => [
                'name' => 'update_convocations',
                'title' => 'Update convocations ',
            ],
            27 => [
                'name' => 'delete_convocations',
                'title' => 'Delete convocations',
            ],
            28 => [
                'name' => 'view_categories',
                'title' => 'View categories',
            ],
            29 => [
                'name' => 'store_categories',
                'title' => 'Store categories ',
            ],
            30 => [
                'name' => 'update_categories',
                'title' => 'Update categories ',
            ],
            31 => [
                'name' => 'delete_categories',
                'title' => 'Delete categories',
            ],
            32 => [
                'name' => 'view_boutiques',
                'title' => 'View boutiques',
            ],
            33 => [
                'name' => 'store_boutiques',
                'title' => 'Store boutiques ',
            ],
            34 => [
                'name' => 'update_boutiques',
                'title' => 'Update boutiques ',
            ],
            35 => [
                'name' => 'delete_boutiques',
                'title' => 'Delete boutiques',
            ],
            36 => [
                'name' => 'view_article_types',
                'title' => 'View article_types',
            ],
            37 => [
                'name' => 'store_article_types',
                'title' => 'Store article_types ',
            ],
            38 => [
                'name' => 'update_article_types',
                'title' => 'Update article_types ',
            ],
            39 => [
                'name' => 'delete_article_types',
                'title' => 'Delete article_types',
            ],
            40 => [
                'name' => 'view_articles',
                'title' => 'View articles',
            ],
            41 => [
                'name' => 'store_articles',
                'title' => 'Store articles ',
            ],
            42 => [
                'name' => 'update_articles',
                'title' => 'Update articles ',
            ],
            43 => [
                'name' => 'delete_articles',
                'title' => 'Delete articles',
            ],
            44 => [
                'name' => 'view_abilities',
                'title' => 'View abilities',
            ],
            45 => [
                'name' => 'store_abilities',
                'title' => 'Store abilities ',
            ],
            46 => [
                'name' => 'update_abilities',
                'title' => 'Update abilities ',
            ],
            47 => [
                'name' => 'delete_abilities',
                'title' => 'Delete abilities',
            ],
            48 => [
                'name' => 'view_roles',
                'title' => 'View roles',
            ],
            49 => [
                'name' => 'store_roles',
                'title' => 'Store roles ',
            ],
            50 => [
                'name' => 'update_roles',
                'title' => 'Update roles ',
            ],
            51 => [
                'name' => 'delete_roles',
                'title' => 'Delete roles',
            ],
            52 => [
                'name' => 'view_permissions',
                'title' => 'View permissions',
            ],
            53 => [
                'name' => 'store_permissions',
                'title' => 'Store permissions ',
            ],
            54 => [
                'name' => 'update_permissions',
                'title' => 'Update permissions ',
            ],
            55 => [
                'name' => 'delete_permissions',
                'title' => 'Delete permissions',
            ]
        ]);
    }
}
