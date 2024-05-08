<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'nombre' => 'Categoría 1',
                'descripcion' => 'Descripción 1',
            ],
            [
                'nombre' => 'Categoría 2',
                'descripcion' => 'Descripción 2',
            ],
            [
                'nombre' => 'Categoría 3',
                'descripcion' => 'Descripción 3',
            ],
        ];

        foreach ($categories as $category) {
            Categoria::create($category);
        }
    }
}
