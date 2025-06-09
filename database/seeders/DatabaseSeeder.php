<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PaisSeeder;
use Database\Seeders\CiudadSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PaisSeeder::class,
            CiudadSeeder::class,
        ]);
    }
}

