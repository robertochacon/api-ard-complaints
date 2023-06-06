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
            ['department_id'=>'1','identification' => '00000000000','name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin']
        ]);
    }
}
