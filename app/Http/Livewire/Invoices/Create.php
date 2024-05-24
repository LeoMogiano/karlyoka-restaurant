<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Factura;
use App\Models\Pedido;
use Livewire\Component;

class Create extends Component
{
    public $isOpen = false;
    public Factura $invoice;
    public Pedido $order;

    public $rules = [
        'invoice.nit' => 'required|string|max:50',
        'invoice.nombre' => 'required|string|max:255',
    ];
    protected $listeners = [
        'create-invoice' => 'openForm',
        'download-invoice' => 'downloadInvoice'
    ];

    public function mount()
    {
        $this->invoice = new Factura();
        $this->order = new Pedido();
    }

    public function openForm($orderId = null)
    {
       
        if ($orderId) {
            $this->order = Pedido::find($orderId);
        }

        $this->isOpen = !$this->isOpen;
    }

    public function createInvoice($isPrinting = false)
    {   
        
        $this->validate();
        
        $this->invoice->pedido_id = $this->order->id;
        $this->invoice->fecha_emision = now();
        $this->invoice->save();

        if ($isPrinting == true) {
            $this->isOpen = false;
            $prevInvoice = $this->invoice;
            $this->invoice = new Factura(); 
            return redirect()->route('invoices.download', ['invoice' => $prevInvoice]);   
            
        }  
        $this->isOpen = false; 
        $this->invoice = new Factura();
    }

    public function render()
    {
        return view('livewire.invoices.create');
    }
}
