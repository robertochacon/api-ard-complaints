<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

            ['department_id' => '6','name' => 'Embarcaciones con perfil sospechoso']
        ]);

        DB::table('users')->insert([
            ['department_id'=>'1','identification' => '00000000000','name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin','phone' => '8092342234'],
            ['department_id'=>'2','identification' => '00000000000','name' => 'Usuario m2','email' => 'usuariom2@gmail.com','password' => bcrypt('usuariom2'),'role' => 'admin','phone' => '829234211']
        ]);

        DB::table('complaints')->insert([
            ['identification' => '00000000000','user_id'=>'1','department_id'=>'1','name' => 'Admin','phone' => '80923459823','type_id' => '1','anonymous' => true,'address' => 'Example 1'],
            ['identification' => '00000000000','user_id'=>'2','department_id'=>'2','name' => 'Usuario m2','phone' => '80912359823','type_id' => '2','anonymous' => true,'address' => 'Example 2']
        ]);

    }
}
