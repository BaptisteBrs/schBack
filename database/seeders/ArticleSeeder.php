<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('article')->insert([
            0 => [
                'title' => 'Finale de la coupe du monde',
                'publication' => Carbon::createFromFormat('d/m/Y H:i:s',  '15/12/2022 00:00:00'),
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'begin' => null,
                'end' => null,
                'type' => 1,
                'description' => 'Retransmission du match au foyer du club. Venez nombreux supportez les bleus.',
                'picture' => 'images/article/france-maroc-coupe-du-monde-2022-ce-qu-il-faut-savoir-sur-le-match.jpg'
            ],
            1 => [
                'title' => 'Planning d arbitre',
                'publication' => Carbon::createFromFormat('d/m/Y H:i:s',  '15/12/2022 00:00:00'),
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'begin' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'end' => Carbon::createFromFormat('d/m/Y H:i:s',  '23/06/2023 00:00:00'),
                'type' => 2,
                'description' => 'Planning d arbitre pour les séniors du club',
                'picture' => 'images/article/planning.png'
            ],
            2 => [
                'title' => 'Bouriche du club',
                'publication' => Carbon::createFromFormat('d/m/Y H:i:s',  '15/12/2022 00:00:00'),
                'date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'begin' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'end' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/12/2022 00:00:00'),
                'type' => 3,
                'description' => 'Bourriche du club. 2€ le ticket, 5€ les trois. ',
                'picture' => 'images/article/bourriche.jpeg'
            ],
        ]);
    }
}
