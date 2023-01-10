<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partenaire')->insert([
            0 => [
                'email' => null,
                'phone' => '09 88 51 64 20',
                'address' => '39 Av. des Sports (RD33)',
                'zip' => '44410',
                'city' => 'Herbignac',
                'name' => 'L‘oben',
                'website' => 'https://www.lobenherbignac.fr',
                'picture' => 'images/partenaire/Carte_de_visite_oben.png',
            ]
        ]);
    }
}
