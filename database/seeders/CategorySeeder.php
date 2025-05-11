<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cultura y Tradiciones',
                'slug' => Str::slug('Cultura y Tradiciones'),
                'description' => 'Relatos orales, danzas, música, gastronomía, vestimenta y celebraciones propias de las comunidades NAPR.',
                'type' => 'temática',
            ],
            [
                'name' => 'Historia y Memoria',
                'slug' => Str::slug('Historia y Memoria'),
                'description' => 'Narrativas históricas, líderes comunitarios, procesos de resistencia y eventos significativos en la historia de estas comunidades.',
                'type' => 'temática',
            ],
            [
                'name' => 'Educación y Saberes Ancestrales',
                'slug' => Str::slug('Educación y Saberes Ancestrales'),
                'description' => 'Prácticas educativas tradicionales, conocimientos transmitidos generacionalmente y experiencias pedagógicas propias.',
                'type' => 'temática',
            ],
            [
                'name' => 'Arte y Expresiones Creativas',
                'slug' => Str::slug('Arte y Expresiones Creativas'),
                'description' => 'Obras de arte, literatura, poesía, fotografía y otras manifestaciones artísticas que expresen la identidad cultural.',
                'type' => 'temática',
            ],
            [
                'name' => 'Territorio y Medio Ambiente',
                'slug' => Str::slug('Territorio y Medio Ambiente'),
                'description' => 'Relación con la tierra, prácticas de sostenibilidad, defensa del territorio y conocimientos ecológicos tradicionales.',
                'type' => 'temática',
            ],
            [
                'name' => 'Salud y Bienestar',
                'slug' => Str::slug('Salud y Bienestar'),
                'description' => 'Prácticas de medicina tradicional, experiencias en salud comunitaria y bienestar integral.',
                'type' => 'temática',
            ],
            [
                'name' => 'Emprendimiento y Economía Solidaria',
                'slug' => Str::slug('Emprendimiento y Economía Solidaria'),
                'description' => 'Iniciativas económicas propias, emprendimientos comunitarios y experiencias de economía solidaria.',
                'type' => 'temática',
            ],
            [
                'name' => 'Juventud y Liderazgo',
                'slug' => Str::slug('Juventud y Liderazgo'),
                'description' => 'Experiencias de jóvenes líderes, proyectos juveniles y participación en procesos comunitarios.',
                'type' => 'temática',
            ],
            [
                'name' => 'Mujeres y Equidad de Género',
                'slug' => Str::slug('Mujeres y Equidad de Género'),
                'description' => 'Historias de mujeres líderes, experiencias de empoderamiento y luchas por la equidad de género.',
                'type' => 'temática',
            ],
            [
                'name' => 'Tecnología y Comunicación',
                'slug' => Str::slug('Tecnología y Comunicación'),
                'description' => 'Uso de tecnologías en la comunidad, medios de comunicación propios y experiencias en inclusión digital.',
                'type' => 'temática',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
