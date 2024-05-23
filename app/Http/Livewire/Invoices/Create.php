<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Factura;
use App\Models\Pedido;
use Livewire\Component;

class Create extends Component
{
    public $isOpen = false;
    public Pedido $order;

    public $rules = [
        'invoice.nit' => 'required|string|max:50',
        'invoice.nombre' => 'required|string|max:255',
    ];
    protected $listeners = [
        'create-invoice' => 'openForm',
    ];

    public function mount()
    {
    }

    public function openForm($orderId)
    {
        if ($orderId) {
            $this->order = Pedido::find($orderId);
        }

        $this->isOpen = true;
    }

    public function createInvoice()
    {
        //$this->order
    }

    public function render()
    {
        return view('livewire.invoices.create');
    }
}
