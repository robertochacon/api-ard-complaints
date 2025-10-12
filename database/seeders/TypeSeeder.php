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
            ['name' => 'Viajes ilegales', 'status' => 'active'],
            ['name' => 'Robo de embarcaciones', 'status' => 'active'],
            ['name' => 'Pérdida de embarcaciones', 'status' => 'active'],
            ['name' => 'Construccion ilegal de embarcaciones', 'status' => 'active'],
            ['name' => 'Violacion a los 60 Mt2 de Construcción', 'status' => 'active'],
            ['name' => 'Derrame de combustibles', 'status' => 'active'],
            ['name' => 'Embarcaciones a alta velocidad (Recreo)', 'status' => 'active'],
            ['name' => 'Pesca Ilega', 'status' => 'active'],
            ['name' => 'Corrupción de miembros', 'status' => 'active'],
            ['name' => 'Acumulación de desechos solicitando', 'status' => 'active'],
            ['name' => 'Embarcaciones con perfil sospechoso', 'status' => 'active']
        ]);
    }
}