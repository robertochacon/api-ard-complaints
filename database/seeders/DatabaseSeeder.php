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
        DB::table('users')->insert([
            ['identification' => '00000000000','name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin']
        ]);
    }
}
