<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paises')->insert([
            ['nombre' => 'Colombia'],
            ['nombre' => 'Venezuela'],
        ]);
    }
}
