<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['department_id'=>'1','identification' => '00000000000','name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin','phone' => '8092342234'],
            ['department_id'=>'2','identification' => '00000000000','name' => 'Usuario m2','email' => 'usuariom2@gmail.com','password' => bcrypt('usuariom2'),'role' => 'admin','phone' => '829234211']
        ]);
    }
}