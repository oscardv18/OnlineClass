<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol_type' => 'Institución',
        ]);
        Rol::create([
            'rol_type' => 'Profesor',
        ]);
        Rol::create([
            'rol_type' => 'Estudiante',
        ]);
    }
}
