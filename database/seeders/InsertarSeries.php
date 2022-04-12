<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertarSeries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert(array(
            [
                'name'  => 'Dragon Ball Z',
                'desc'  => 'Su trama describe las aventuras de Goku, un guerrero saiyajin, cuyo fin es proteger a la Tierra de otros seres que quieren conquistarla y exterminar a la humanidad. Conforme transcurre la trama, conoce a otros personajes que le ayudan en este propósito. El nombre de la serie proviene de unas esferas mágicas que al ser reunidas invocan a un dragón que concede deseos. En varias ocasiones resultan útiles tanto para Gokū y sus amigos como para la humanidad, aunque también son procuradas de forma constante por algunos seres malignos.',
                'image' => 'https://img.betaseries.com/YvSM_mH8U1B4Iz8d2-5t5Zw61MQ=/600x900/smart/https%3A%2F%2Fpictures.betaseries.com%2Ffonds%2Fposter%2F3440264042f307c0fa15dfa2decafe9d.jpg'
            ],
            [
                'name'  => 'Saint Seiya',
                'desc'  => 'Los Caballeros del Zodiaco, es una serie de manga escrita e ilustrada por Masami Kurumada. Fue publicada desde el 3 de diciembre de 1985 en la revista Shūkan Shōnen Jump de la editorial Shūeisha hasta el 12 de diciembre de 1990 en la revista V Jump. Fue adaptado posteriormente en una serie de animación (anime) de 114 episodios, una OVA de 31 episodios y una ONA de 13 episodios, en total 158. También se han producido cinco películas animadas y una película de animación CG, además de varias precuelas y secuelas oficiales de la historia original.',
                'image' => 'https://sm.ign.com/ign_latam/tv/s/saint-seiy/saint-seiya_mtwp.jpg'
            ]
        ));
        //$this->command->info("Mensaje");
        
    }
}
