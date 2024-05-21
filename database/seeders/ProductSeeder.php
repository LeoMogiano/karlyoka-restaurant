<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nombre' => 'Producto 1',
                'descripcion' => 'Descripción del producto 1',
                'stock' => 100,
                'precio' => 9.99,
                'image_url' => 'https://example.com/images/producto1.jpg',
                'categoria_id' => 1,
            ],
            [
                'nombre' => 'Producto 2',
                'descripcion' => 'Descripción del producto 2',
                'stock' => 200,
                'precio' => 19.99,
                'image_url' => 'https://example.com/images/producto2.jpg',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Producto 3',
                'descripcion' => 'Descripción del producto 3',
                'stock' => 150,
                'precio' => 29.99,
                'image_url' => 'https://example.com/images/producto3.jpg',
                'categoria_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Producto::create($product);
        }
    }
}
