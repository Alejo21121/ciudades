<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ciudades')->insert([
            ['nombre' => 'Bogotá', 'estado' => 'Activo', 'id_pais' => 1, 'created_at' => now()],
            ['nombre' => 'Cali', 'estado' => 'Activo', 'id_pais' => 1, 'created_at' => now()],
            ['nombre' => 'Barranquilla', 'estado' => 'Activo', 'id_pais' => 1, 'created_at' => now()],
            ['nombre' => 'Caracas', 'estado' => 'Activo', 'id_pais' => 2, 'created_at' => now()],
            ['nombre' => 'Maracaibo', 'estado' => 'Inactivo', 'id_pais' => 2, 'created_at' => now()],
        ]);
    }
}
