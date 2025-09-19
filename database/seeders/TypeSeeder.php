<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['department_id' => '1','name' => 'Viajes ilegales'],
            ['department_id' => '1','name' => 'Robo de embarcaciones'],
            ['department_id' => '1','name' => 'Pérdida de embarcaciones'],

            ['department_id' => '2','name' => 'Construccion ilegal de embarcaciones'],
            ['department_id' => '2','name' => 'Violacion a los 60 Mt2 de Construcción'],
            ['department_id' => '2','name' => 'Derrame de combustibles'],
            ['department_id' => '2','name' => 'Embarcaciones a alta velocidad (Recreo)'],

            ['department_id' => '3','name' => 'Pesca Ilega'],

            ['department_id' => '4','name' => 'Corrupción de miembros'],

            ['department_id' => '5','name' => 'Acumulación de desechos solicitando'],

            ['department_id' => '6','name' => 'Embarcaciones con perfil sospechoso']
        ]);
    }
}