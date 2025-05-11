<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('communities')->insert(
            [
                [
                    'name' => 'San Basilio de Palenque',
                    'description' => 'Considerado el primer pueblo libre de América, fundado en el siglo XVII por africanos esclavizados que escaparon del yugo colonial. Declarado Patrimonio Cultural e Inmaterial de la Humanidad por la UNESCO, es un símbolo de resistencia y preservación de raíces africanas en Colombia.',
                    'location' => 'Mahates, Bolívar',
                    'banner_image' => 'img/imagen14.jpg',
                    'logo' => null, 
                    'history' => 'Fundado por cimarrones liderados por Benkos Biohó, este palenque se consolidó como un refugio autónomo donde se mantuvieron tradiciones africanas. En 1603, la Corona española reconoció su libertad, aunque su lucha por autonomía continuó por décadas. Hoy es un referente de identidad afrodescendiente.',
                    'traditions' => 'Destacan los ritmos de tambores como el "bullerengue" y la "champeta", la lengua palenquera (único criollo de base léxica española en América), y una gastronomía ancestral con platos como el "sancocho de gallina" y el "fuerte candiao". Sus rituales fúnebres, como el "lumbalú", son parte esencial de su cosmovisión.',
                    'contact_info' => null,
                    'language' => 'Palenquero',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Raizales de San Andrés',
                    'description' => 'Pueblo afrocaribeño con una identidad única, resultado del mestizaje entre africanos esclavizados, colonos británicos y migrantes antillanos. Su cultura refleja la herencia protestante y las tradiciones insulares del Caribe anglófono.',
                    'location' => 'Archipiélago de San Andrés, Providencia y Santa Catalina',
                    'banner_image' => 'img/imagen13.jpg',
                    'logo' => null, 
                    'history' => 'Asentados desde el siglo XVIII, los raizales desarrollaron una sociedad distintiva bajo dominio británico. Tras la independencia de Colombia, han luchado por preservar su idioma y autonomía cultural frente a la creciente influencia continental.',
                    'traditions' => 'Practican el "mento" (música folclórica), celebran el "Coconut Carnival" y mantienen danzas como el "calypso". Su gastronomía mezcla cocina africana con ingredientes locales: "rondón" (sopa de mariscos) y "breadfruit" (fruta de pan). La religión bautista marca sus festividades y organización social.',
                    'contact_info' => null,
                    'language' => 'Creole (inglés criollo)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Afrochocoanos',
                    'description' => 'Población afrodescendiente asentada en el departamento del Chocó, una de las regiones con mayor biodiversidad del mundo. Su cultura está profundamente ligada a los ríos y selvas del Pacífico colombiano.',
                    'location' => 'Chocó, Colombia',
                    'banner_image' => 'img/imagen1.jpeg',
                    'logo' => null, 
                    'history' => 'Llegaron como esclavizados para trabajar en minería durante la colonia. Tras la abolición, se adaptaron al territorio selvático, desarrollando prácticas sostenibles y una espiritualidad que sincretiza catolicismo con tradiciones africanas.',
                    'traditions' => 'Son guardianes de la "chirimía" (música con flautas y tambores), los "arrullos" (cantos fúnebres) y festivales como el "San Pacho" en Quibdó. Elaboran artesanías con balso y coco, y su cocina incluye platos como el "tapao de pescado" y el "currulao" (bebida de borojó).',
                    'contact_info' => null,
                    'language' => 'Español con modismos locales',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Afrovallecaucanos',
                    'description' => 'Grupo afrodescendiente que ha moldeado la identidad cultural del Valle del Cauca, especialmente en ciudades como Cali y Buenaventura, donde su influencia es fundamental en la música, danza y gastronomía.',
                    'location' => 'Valle del Cauca, Colombia',
                    'banner_image' => 'img/imagen2.jpeg',
                    'logo' => null, 
                    'history' => 'Llegaron al puerto de Buenaventura durante la época colonial. En el siglo XX, migraron a Cali, donde su cultura se fusionó con corrientes urbanas, dando origen a expresiones como la salsa caleña.',
                    'traditions' => 'Iconos como la "Feria de Cali" y el "Petronio Álvarez" celebran su legado. Practican danzas como el "bunde" y el "abosao", y preservan recetas como el "encocado" y el "chontaduro" con miel. La marimba de chonta es su instrumento emblemático.',
                    'contact_info' => null,
                    'language' => 'Español con giros regionales',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Wayuu',
                    'description' => 'Pueblo indígena ancestral de La Guajira, conocido por su resistencia cultural y su sistema matrilineal. Habitan el desierto más grande de Colombia, adaptándose a condiciones extremas con ingenio.',
                    'location' => 'La Guajira, Colombia',
                    'banner_image' => 'img/imagen15.jpg',
                    'logo' => null, 
                    'history' => 'Nunca fueron conquistados totalmente por los españoles. Pastores y comerciantes, históricamente han controlado rutas entre el Caribe y el interior. Hoy enfrentan desafíos por la minería y el cambio climático.',
                    'traditions' => 'Tejen las famosas "mochilas wayuu" con diseños oníricos ("kanas"). Realizan el "encierro" (rito de paso femenino) y celebran el "Yonna" (danza de la lluvia). Su leyenda de "Waleker" (la araña tejedora) explica el origen de sus artesanías.',
                    'contact_info' => null,
                    'language' => 'Wayuunaiki',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Misak (Guambianos)',
                    'description' => 'Pueblo indígena del Cauca reconocido por su lucha por la autonomía territorial y la revitalización de su cultura. Visten trajes azules distintivos que reflejan su conexión con el cielo y el agua.',
                    'location' => 'Cauca, Colombia',
                    'banner_image' => 'img/imagen16.jpg',
                    'logo' => null, 
                    'history' => 'Han resistido desde la colonia, participando en movimientos agrarios. En 1980, recuperaron tierras en la "Hacienda Honduras", un hito en su reivindicación. Son guardianes del páramo y el sistema de "usos y costumbres".',
                    'traditions' => 'Practican el "trueque" en mercados locales, usan el "bastón de mando" como símbolo de autoridad, y celebran el "Saakhelu" (ritual de agradecimiento a la tierra). Su medicina ancestral incluye plantas como la "ruda" y el "yagé".',
                    'contact_info' => null,
                    'language' => 'Nam Trik',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Emberá',
                    'description' => 'Pueblo indígena nómada que habita las selvas del Chocó y otras regiones. Conocidos por su pintura corporal con jagua (tinte natural) y su relación simbiótica con la naturaleza.',
                    'location' => 'Chocó, Colombia',
                    'banner_image' => 'img/imagen17.jpg',
                    'logo' => null, 
                    'history' => 'Originalmente de la región del Darién, migraron para escapar de la conquista. Hoy, algunos grupos viven en reservas mientras otros mantienen su estilo de vida tradicional en zonas remotas.',
                    'traditions' => 'Realizan "cantos de curación" con maracas y flautas. El "baile de la piña" simboliza la cosecha, y sus "jaguares pintados" representan fuerza espiritual. Elaboran canastos en "werregue" (fibra de palma) con diseños geométricos.',
                    'contact_info' => null,
                    'language' => 'Emberá',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
