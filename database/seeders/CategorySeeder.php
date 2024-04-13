<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Personal',
            'description' => 'Tareas de tipo personal'
        ]);

        Category::create([
            'name' => 'Académicas',
            'description' => 'Tareas de tipo Tareas de tipo académico'
        ]);

        Category::create([
            'name' => 'Laboral',
            'description' => 'Tareas de tipo laboral'
        ]);

        Category::create([
            'name' => 'Hogar',
            'description' => 'Tareas del hogar (Gatos, Compras,etc)'
        ]);



        Category::create([
            'name' => 'Médicas',
            'description' => 'Tareas de lo relacionado con la salud'
        ]);
    }
}
