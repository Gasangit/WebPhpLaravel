<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;

class categoriasConsolasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(
            [
            'nombre' => 'PLAYSTATION',
            'descripcion' => 'Refiere a la consola de Playstation de última generación Playstation 5'
            ]
        );
        Categoria::create(
            [
            'nombre' => 'XBOX',
            'descripcion' => 'Refiere a la consola de Xbox de última generación'
            ]
        );
        Categoria::create(
            [
            'nombre' => 'SWITCH',
            'descripcion' => 'Refiere a la consola de Nintendo de última generación'
            ]
        );
        Categoria::create(
            [
            'nombre' => 'PC',
            'descripcion' => 'Refiere a la computadora de escritorio y/o notebook'
            ]
        );
    }
}
