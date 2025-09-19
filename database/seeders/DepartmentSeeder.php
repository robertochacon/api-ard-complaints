<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'División de Inteligencia Naval (M-2), ARD.'],
            ['name' => 'Capitania de Puertos, ARD.'],
            ['name' => 'Dirección Nacional de Pesca, ARD.'],
            ['name' => 'Dirección de Asuntos Internos, ARD.'],
            ['name' => 'Dragas y Presas, ARD.'],
            ['name' => 'Operaciones Maritima (COM).'],
        ]);
    }
}