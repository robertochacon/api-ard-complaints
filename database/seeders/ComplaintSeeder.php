<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Complaints;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usar el modelo para que se genere automáticamente el UUID
        Complaints::create([
            'identification' => '00000000000',
            'user_id' => '1',
            'department_id' => '1',
            'name' => 'Admin',
            'phone' => '80923459823',
            'type_id' => '1',
            'anonymous' => true,
            'address' => 'Example 1'
        ]);

        Complaints::create([
            'identification' => '00000000000',
            'user_id' => '2',
            'department_id' => '2',
            'name' => 'Usuario m2',
            'phone' => '80912359823',
            'type_id' => '2',
            'anonymous' => true,
            'address' => 'Example 2'
        ]);
    }
}