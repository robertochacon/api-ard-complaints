<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Departaments;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Recursos Humanos', 'status' => 'active'],
            ['name' => 'Administración', 'status' => 'active'],
            ['name' => 'Finanzas', 'status' => 'active'],
            ['name' => 'Tecnología', 'status' => 'active'],
            ['name' => 'Servicios Generales', 'status' => 'active'],
            ['name' => 'Atención al Cliente', 'status' => 'active'],
            ['name' => 'Legal', 'status' => 'active'],
        ];

        foreach ($departments as $department) {
            Departaments::create($department);
        }
    }
}