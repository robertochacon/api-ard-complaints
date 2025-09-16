<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Types;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Corrupción', 'status' => 'active'],
            ['name' => 'Maltrato', 'status' => 'active'],
            ['name' => 'Negligencia', 'status' => 'active'],
            ['name' => 'Discriminación', 'status' => 'active'],
            ['name' => 'Abuso de poder', 'status' => 'active'],
            ['name' => 'Violación de derechos', 'status' => 'active'],
            ['name' => 'Otros', 'status' => 'active'],
        ];

        foreach ($types as $type) {
            Types::create($type);
        }
    }
}