<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AbilitiesSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            UsersSeeder::class,
            PermissionSeeder::class,
            AssignedRoleSeeder::class,
            PartenaireSeeder::class,
            GameTypeSeeder::class,
            TeamSeeder::class,
            GameSeeder::class,
            ConvocationSeeder::class,
            ConvocationPlayerSeeder::class,
            ArticleTypeSeeder::class,
            ArticleSeeder::class,
            TagSeeder::class,
            ArticleTagSeeder::class
        ]);
    }
}
