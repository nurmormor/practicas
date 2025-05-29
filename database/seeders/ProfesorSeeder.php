<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profesor;
use App\Models\Unidad;

class ProfesorSeeder extends Seeder
{
    public function run() {
        Profesor::factory(10)->create();
    }
}
