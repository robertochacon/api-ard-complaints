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
            ['name' => 'COM'],
            ['name' => 'M2'],
            ['name' => 'Capitanía de puertos'],
            ['name' => 'Pesca'],
        ]);

        DB::table('types')->insert([
            ['department_id' => '3','name' => 'Viajes ilegales'],
            ['department_id' => '3','name' => 'Tráfico maritimo'],
            ['department_id' => '1','name' => 'Trata de personas'],
            ['department_id' => '3','name' => 'Construcción ilegal de embarcaciones'],
            ['department_id' => '1','name' => 'Violación a los 60mt2 de construcción'],
            ['department_id' => '4','name' => 'Pesca ilegal'],
            ['department_id' => '2','name' => 'Daños al medio ambiente'],
            ['department_id' => '2','name' => 'Sustancias controladas'],
            ['department_id' => '2','name' => 'Corrupción'],
            ['department_id' => '2','name' => 'Otras']
        ]);

        DB::table('users')->insert([
            ['department_id'=>'1','identification' => '00000000000','name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin'],
            ['department_id'=>'2','identification' => '00000000000','name' => 'Usuario m2','email' => 'usuariom2@gmail.com','password' => bcrypt('usuariom2'),'role' => 'admin']
        ]);

        DB::table('complaints')->insert([
            ['identification' => '00000000000','user_id'=>'1','department_id'=>'1','name' => 'Admin','phone' => '80923459823','type_id' => '1','anonymous' => true,'address' => 'Example 1'],
            ['identification' => '00000000000','user_id'=>'2','department_id'=>'2','name' => 'Usuario m2','phone' => '80912359823','type_id' => '2','anonymous' => true,'address' => 'Example 2']
        ]);

    }
}
