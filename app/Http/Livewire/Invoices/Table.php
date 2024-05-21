<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Factura;
use Livewire\Component;

class Table extends Component
{
    //use WithParent;

    public $columns = [
        "nit",
        "nombre",
        "fecha_emision",
        "pedido_id",
    ];

    public $invoices = [];
    public $confirmDeletionIsOpen = false;
    public $invoiceSelected = null;

    protected $listeners = [
        'invoice-saved' => 'mount',
        'invoice-search' => 'searchInvoices',
       // 'open-form' => 'karla'
    ];
   
    public function searchInvoices($searchText) {
        $this->mount($searchText);
    }

    public function mount($searchText = null)
    {
        $this->invoices = Factura::when($searchText, function ($query) use ($searchText) {
            return $query->where('nit', 'like', '%' . $searchText . '%')
                         ->orWhere('nombre', 'like', '%' . $searchText . '%')
                         ->orWhere('fecha_emision', 'like', '%' . $searchText . '%')
                         ->orWhere('pedido_id', 'like', '%' . $searchText . '%');
        })->get();
    }

    public function deleteInvoice($invoice)
    {
        $this->invoiceSelected = $invoice;
        $this->confirmDeletionIsOpen = true;
    }

    public function confirmInvoiceDeletion($id)
    {
        Factura::destroy($id);

        $this->invoices = $this->invoices->reject(function ($invoice) use ($id) {
            return $invoice->id == $id;
        });

        $this->invoiceSelected = null;
        $this->confirmDeletionIsOpen = false;
    }


// // //     public function karla($invoiceId)
// // // {

// // //    // $this->getParentProperty()->loadInvoiceDetails($invoiceId);

// // //    $this->dispatchBrowserEvent('load-invoice-details', ['invoiceId' => $invoiceId]);



// // //     $this->emit('show-invoice-details', $invoiceId);

// // //     // Busca la factura por su ID y la asigna a la propiedad $invoice
// // //     //$this->invoice = Factura::findOrFail($invoiceId);
// // //     // Mensaje de depuración
// // //     dd('Detalles de factura cargados para ID de factura erorrr: ' . $invoiceId);
// // // }


    // // //   // Método para emitir el evento 'show-invoice-details' con el ID de la factura seleccionada
    // // //   public function showInvoiceDetails($invoiceId)
    // // //   {
    // // //     $this->emit('show-invoice-details', $invoiceId);
    // // //   }


    public function render()
    {
        return view('livewire.invoices.table');
    }
}
