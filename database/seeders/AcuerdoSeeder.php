<?php

namespace Database\Seeders;
use App\Models\Acuerdo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcuerdoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Acuerdo::factory(10)->create();
    }
}
