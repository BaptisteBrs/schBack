<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_type')->insert([
            0 => [
                'name' => 'evenement',
                'picture' => 'images/article_type/evenement.png',
            ],
            1 => [
                'name' => 'programme',
                'picture' => 'images/article_type/programme.png',
            ],
            2 => [
                'name' => 'convocation',
                'picture' => 'images/article_type/convocation.png',
            ],
            3 => [
                'name' => 'informations',
                'picture' => 'images/article_type/informations.png',
            ],
            4 => [
                'name' => 'planning',
                'picture' => 'images/article_type/planning.png',
            ],
            5 => [
                'name' => 'resultat',
                'picture' => 'images/article_type/resultat.png',
            ],
        ]);
    }
}
