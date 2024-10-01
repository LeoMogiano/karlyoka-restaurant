<?php

namespace Database\Seeders;

use App\Models\ordero;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'nro' => '001',
                'fecha_recepcion' => '2024-05-01 10:00:00',
                'fecha_entrega' => '2024-05-05 15:00:00',
                'total' => 150.00,
                'user_id' => 1, // Asegúrate de que este usuario exista
            ],
            [
                'nro' => '002',
                'fecha_recepcion' => '2024-05-02 11:00:00',
                'fecha_entrega' => '2024-05-06 16:00:00',
                'total' => 200.00,
                'user_id' => 1, // Asegúrate de que este usuario exista
            ],
            // Agrega más pedidos según sea necesario
        ];

        foreach ($orders as $order) {
            Pedido::create($order);
        }
    }
}
