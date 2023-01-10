<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tag')->insert([
            0 => [
                'tag' => 17,
                'article' => 1,
            ],
            1 => [
                'tag' => 1,
                'article' => 3,
            ],
            2 => [
                'tag' => 2,
                'article' => 3,
            ],
            3 => [
                'tag' => 3,
                'article' => 3,
            ],
        ]);
    }
}
