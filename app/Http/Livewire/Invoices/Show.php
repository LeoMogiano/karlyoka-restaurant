<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Factura;
use Livewire\Component;

class Show extends Component
{
    public $isOpen = false;
    public Factura $invoice;
    //public $invoice;

    public $rules = [
        'invoice.nit' => 'required|string|max:50',
        'invoice.nombre' => 'required|string|max:255',
    ];

    public function mount()
    {
        // dd("mount show invoice");
        $this->invoice = new Factura();
    }

    // Escucha el evento 'show-invoice-details' y carga los detalles de la factura
    protected $listeners = [
        'show-invoice-details' => 'openForm', // php artisan make:livewire Invoices/Create
    ];

    // Método para cargar los detalles de la factura
    public function openForm($invoiceId)
    {
        if ($invoiceId) {
            $this->invoice = Factura::where('id', $invoiceId)->firstOrFail();
        } else {
            $this->invoice = new Factura();
        }
        // if ($invoiceId) {
        //     // Busca la factura por su ID y la asigna a la propiedad $invoice
        //     $this->invoice = Factura::findOrFail($invoiceId);
        // }

        $this->isOpen = true;
    }

    public function render()
    {
        return view('livewire.invoices.show');
    }

    // public $invoice;

    // // Recibe el ID de la factura como parámetro
    // public function mount($invoiceId)
    // {
    //     // Busca la factura por su ID y la asigna a la propiedad $invoice
    //     $this->invoice = Factura::findOrFail($invoiceId);
    // }
}
