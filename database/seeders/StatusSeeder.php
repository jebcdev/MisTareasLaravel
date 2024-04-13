<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Iniciada',
            'description' => 'Tarea recien creada'
        ]);

        Status::create([
            'name' => 'En Progreso',
            'description' => 'Tarea en la cual ya se esta trabajando'
        ]);

        Status::create([
            'name' => 'Finalizada',
            'description' => 'Esta tarea ya acabó'
        ]);
    }
}
