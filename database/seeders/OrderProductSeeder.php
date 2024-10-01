<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderProducts = [
            [
                'pedido_id' => 1,
                'producto_id' => 1,
                'cantidad' => 2,
                'subtotal' => 50.00,
            ],
            [
                'pedido_id' => 1,
                'producto_id' => 2,
                'cantidad' => 1,
                'subtotal' => 100.00,
            ],
            [
                'pedido_id' => 2,
                'producto_id' => 1,
                'cantidad' => 3,
                'subtotal' => 75.00,
            ],
            // Agrega más relaciones según sea necesario
        ];

        foreach ($orderProducts as $orderProduct) {
            PedidoProducto::create($orderProduct);
        }
    }
}
