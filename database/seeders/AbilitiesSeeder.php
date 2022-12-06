<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'entity_type'=>'*'
            ],
            1 => [
                'name' => 'store_users',
                'title' => 'Store users',
                'entity_type'=>'*'
            ],
            2 => [
                'name' => 'update_user',
                'title' => 'Update users',
                'entity_type'=>'*'
            ],
            3 => [
                'name' => 'delete_user',
                'title' => 'Delete users',
                'entity_type'=>'*'
            ],
            4 => [
                'name' => 'view_teams',
                'title' => 'View teams',
                'entity_type'=>'*'
            ],
            5 => [
                'name' => 'store_teams',
                'title' => 'Store teams',
                'entity_type'=>'*'
            ],
            6 => [
                'name' => 'update_teams',
                'title' => 'Update teams',
                'entity_type'=>'*'
            ],
            7 => [
                'name' => 'delete_teams',
                'title' => 'Delete teams',
                'entity_type'=>'*'
            ],
            8 => [
                'name' => 'view_tags',
                'title' => 'View tags',
                'entity_type'=>'*'
            ],
            9 => [
                'name' => 'store_tags',
                'title' => 'Store tags',
                'entity_type'=>'*'
            ],
            10 => [
                'name' => 'update_tags',
                'title' => 'Update tags',
                'entity_type'=>'*'
            ],
            11 => [
                'name' => 'delete_tags',
                'title' => 'Delete tags',
                'entity_type'=>'*'
            ],
            12 => [
                'name' => 'view_partenaires',
                'title' => 'View partenaires',
                'entity_type'=>'*'
            ],
            13 => [
                'name' => 'store_partenaires',
                'title' => 'Store partenaires',
                'entity_type'=>'*'
            ],
            14 => [
                'name' => 'update_partenaires',
                'title' => 'Update partenaires',
                'entity_type'=>'*'
            ],
            15 => [
                'name' => 'delete_partenaires',
                'title' => 'Delete partenaires',
                'entity_type'=>'*'
            ],
            16 => [
                'name' => 'view_game_types',
                'title' => 'View games types',
                'entity_type'=>'*'
            ],
            17 => [
                'name' => 'store_game_types',
                'title' => 'Store games types',
                'entity_type'=>'*'
            ],
            18 => [
                'name' => 'update_game_types',
                'title' => 'Update games types',
                'entity_type'=>'*'
            ],
            19 => [
                'name' => 'delete_game_types',
                'title' => 'Delete games types',
                'entity_type'=>'*'
            ],
            20 => [
                'name' => 'view_games',
                'title' => 'View games',
                'entity_type'=>'*'
            ],
            21 => [
                'name' => 'store_games',
                'title' => 'Store games ',
                'entity_type'=>'*'
            ],
            22 => [
                'name' => 'update_games',
                'title' => 'Update games ',
                'entity_type'=>'*'
            ],
            23 => [
                'name' => 'delete_games',
                'title' => 'Delete games',
                'entity_type'=>'*'
            ],
            24 => [
                'name' => 'view_convocations',
                'title' => 'View convocations',
                'entity_type'=>'*'
            ],
            25 => [
                'name' => 'store_convocations',
                'title' => 'Store convocations ',
                'entity_type'=>'*'
            ],
            26 => [
                'name' => 'update_convocations',
                'title' => 'Update convocations ',
                'entity_type'=>'*'
            ],
            27 => [
                'name' => 'delete_convocations',
                'title' => 'Delete convocations',
                'entity_type'=>'*'
            ],
            28 => [
                'name' => 'view_categories',
                'title' => 'View categories',
                'entity_type'=>'*'
            ],
            29 => [
                'name' => 'store_categories',
                'title' => 'Store categories ',
                'entity_type'=>'*'
            ],
            30 => [
                'name' => 'update_categories',
                'title' => 'Update categories ',
                'entity_type'=>'*'
            ],
            31 => [
                'name' => 'delete_categories',
                'title' => 'Delete categories',
                'entity_type'=>'*'
            ],
            32 => [
                'name' => 'view_boutiques',
                'title' => 'View boutiques',
                'entity_type'=>'*'
            ],
            33 => [
                'name' => 'store_boutiques',
                'title' => 'Store boutiques ',
                'entity_type'=>'*'
            ],
            34 => [
                'name' => 'update_boutiques',
                'title' => 'Update boutiques ',
                'entity_type'=>'*'
            ],
            35 => [
                'name' => 'delete_boutiques',
                'title' => 'Delete boutiques',
                'entity_type'=>'*'
            ],
            36 => [
                'name' => 'view_article_types',
                'title' => 'View article_types',
                'entity_type'=>'*'
            ],
            37 => [
                'name' => 'store_article_types',
                'title' => 'Store article_types ',
                'entity_type'=>'*'
            ],
            38 => [
                'name' => 'update_article_types',
                'title' => 'Update article_types ',
                'entity_type'=>'*'
            ],
            39 => [
                'name' => 'delete_article_types',
                'title' => 'Delete article_types',
                'entity_type'=>'*'
            ],
            40 => [
                'name' => 'view_articles',
                'title' => 'View articles',
                'entity_type'=>'*'
            ],
            41 => [
                'name' => 'store_articles',
                'title' => 'Store articles ',
                'entity_type'=>'*'
            ],
            42 => [
                'name' => 'update_articles',
                'title' => 'Update articles ',
                'entity_type'=>'*'
            ],
            43 => [
                'name' => 'delete_articles',
                'title' => 'Delete articles',
                'entity_type'=>'*'
            ],
            44 => [
                'name' => 'view_abilities',
                'title' => 'View abilities',
                'entity_type'=>'*'
            ],
            45 => [
                'name' => 'store_abilities',
                'title' => 'Store abilities ',
                'entity_type'=>'*'
            ],
            46 => [
                'name' => 'update_abilities',
                'title' => 'Update abilities ',
                'entity_type'=>'*'
            ],
            47 => [
                'name' => 'delete_abilities',
                'title' => 'Delete abilities',
                'entity_type'=>'*'
            ],
            48 => [
                'name' => 'view_roles',
                'title' => 'View roles',
                'entity_type'=>'*'
            ],
            49 => [
                'name' => 'store_roles',
                'title' => 'Store roles ',
                'entity_type'=>'*'
            ],
            50 => [
                'name' => 'update_roles',
                'title' => 'Update roles ',
                'entity_type'=>'*'
            ],
            51 => [
                'name' => 'delete_roles',
                'title' => 'Delete roles',
                'entity_type'=>'*'
            ],
            52 => [
                'name' => 'view_permissions',
                'title' => 'View permissions',
                'entity_type'=>'*'
            ],
            53 => [
                'name' => 'store_permissions',
                'title' => 'Store permissions ',
                'entity_type'=>'*'
            ],
            54 => [
                'name' => 'update_permissions',
                'title' => 'Update permissions ',
                'entity_type'=>'*'
            ],
            55 => [
                'name' => 'delete_permissions',
                'title' => 'Delete permissions',
                'entity_type'=>'*'
            ],
            56 => [
                'name' => '*',
                'title' => 'Every abilities',
                'entity_type'=>'*'
            ],
        ]);
    }
}
