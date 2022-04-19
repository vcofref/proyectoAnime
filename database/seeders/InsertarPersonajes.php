<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertarPersonajes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personajes')->insert(array(
            [
                'name'  => 'Goku',
                'desc'  => 'Su nombre real y de nacimiento es Kakarotto.',
                'image' => 'https://laverdadnoticias.com/__export/1588978094348/sites/laverdad/img/2020/05/08/dia_de_goku_el_origen.png_423682103.png',
                'serie_id' => 1
            ],
            [
                'name'  => 'Vegeta',
                'desc'  => 'Reconocido como el Príncipe Vegeta',
                'image' => 'https://images.mediotiempo.com/_ZTwjAMlHWMvympTJEkLbNbAKF0=/958x596/uploads/media/2022/03/11/rene-garcia-interpreta-voz-vegeta.jpg',
                'serie_id' => 1
            ],
            [
                'name'  => 'Seiya',
                'desc'  => 'Caballero de Bronce con la armadura de Pegaso',
                'image' => 'https://www.quepeliculaver.com/uploads/2021/09/Saint-Seiya-Pegaso.png',
                'serie_id' => 2
            ],
            [
                'name'  => 'Mu',
                'desc'  => 'Caballero de Oro con la armadura de oro de Aries',
                'image' => 'https://snk-seiya.net/guiasaintseiya/Albiero-Mu2.jpg',
                'serie_id' => 2
            ]
        ));
    }
}
