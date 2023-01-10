<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Bouncer;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Bouncer::allow('admin')->to('view_users');
        Bouncer::allow('admin')->to('store_users');
        Bouncer::allow('admin')->to('update_user');
        Bouncer::allow('admin')->to('delete_user');
        Bouncer::allow('admin')->to('view_teams');
        Bouncer::allow('admin')->to('store_teams');
        Bouncer::allow('admin')->to('update_teams');
        Bouncer::allow('admin')->to('delete_teams');
        Bouncer::allow('admin')->to('view_tags');
        Bouncer::allow('admin')->to('store_tags');
        Bouncer::allow('admin')->to('update_tags');
        Bouncer::allow('admin')->to('delete_tags');
        Bouncer::allow('admin')->to('view_partenaires');
        Bouncer::allow('admin')->to('store_partenaires');
        Bouncer::allow('admin')->to('update_partenaires');
        Bouncer::allow('admin')->to('delete_partenaires');
        Bouncer::allow('admin')->to('view_game_types');
        Bouncer::allow('admin')->to('store_game_types');
        Bouncer::allow('admin')->to('update_game_types');
        Bouncer::allow('admin')->to('delete_game_types');
        Bouncer::allow('admin')->to('view_games');
        Bouncer::allow('admin')->to('store_games');
        Bouncer::allow('admin')->to('update_games');
        Bouncer::allow('admin')->to('delete_games');
        Bouncer::allow('admin')->to('view_convocations');
        Bouncer::allow('admin')->to('store_convocations');
        Bouncer::allow('admin')->to('update_convocations');
        Bouncer::allow('admin')->to('delete_convocations');
        Bouncer::allow('admin')->to('view_categories');
        Bouncer::allow('admin')->to('store_categories');
        Bouncer::allow('admin')->to('update_categories');
        Bouncer::allow('admin')->to('delete_categories');
        Bouncer::allow('admin')->to('view_boutiques');
        Bouncer::allow('admin')->to('store_boutiques');
        Bouncer::allow('admin')->to('update_boutiques');
        Bouncer::allow('admin')->to('delete_boutiques');
        Bouncer::allow('admin')->to('view_article_types');
        Bouncer::allow('admin')->to('store_article_types');
        Bouncer::allow('admin')->to('update_article_types');
        Bouncer::allow('admin')->to('delete_article_types');
        Bouncer::allow('admin')->to('view_articles');
        Bouncer::allow('admin')->to('store_articles');
        Bouncer::allow('admin')->to('update_articles');
        Bouncer::allow('admin')->to('delete_articles');
        Bouncer::allow('admin')->to('view_abilities');
        Bouncer::allow('admin')->to('store_abilities');
        Bouncer::allow('admin')->to('update_abilities');
        Bouncer::allow('admin')->to('delete_abilities');
        Bouncer::allow('admin')->to('view_roles');
        Bouncer::allow('admin')->to('store_roles');
        Bouncer::allow('admin')->to('update_roles');
        Bouncer::allow('admin')->to('delete_roles');
        Bouncer::allow('admin')->to('view_permissions');
        Bouncer::allow('admin')->to('store_permissions');
        Bouncer::allow('admin')->to('update_permissions');
        Bouncer::allow('admin')->to('delete_permissions');
    }
}
