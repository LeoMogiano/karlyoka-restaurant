<?php

namespace Database\Seeders;

use App\Models\Factura;
use App\Models\invoiceo;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = [
            [
                'nit' => '123456789',
                'nombre' => 'Cliente 1',
                'fecha_emision' => now(),
                'pedido_id' => 1, // Asegúrate de que este pedido exista
            ],
            [
                'nit' => '987654321',
                'nombre' => 'Cliente 2',
                'fecha_emision' => now(),
                'pedido_id' => 2, // Asegúrate de que este pedido exista
            ],
            // Agrega más facturas según sea necesario
        ];

        foreach ($invoices as $invoice) {
            Factura::create($invoice);
        }
    }
}
