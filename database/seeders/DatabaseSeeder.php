<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UnidadSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(EmpresaSeeder::class);

    }
}
