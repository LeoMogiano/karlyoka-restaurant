<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Factura;
use Livewire\Component;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class Table extends Component
{
    //use WithParent;

    public $columns = [
        "nit/ci",
        "nombre",
        "fecha emision",
        "nro pedido",
        "Total del Pedido",
        "Descargar"
    ];

    public $invoices = [];
    public $confirmDeletionIsOpen = false;
    public $invoiceSelected = null;

    protected $listeners = [
        'invoice-saved' => 'mount',
        'invoice-search' => 'searchInvoices',
        'download-invoice' => 'downloadInvoice'
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
                         ->orWhere('nro_pedido', 'like', '%' . $searchText . '%');
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


    public function downloadInvoice($invoiceId)
    {
        // $invoice = Factura::with('pedido_id')->findOrFail($invoiceId);
        $invoice = Factura::where('id', $invoiceId)->firstOrFail();
        $pedido=$invoice->pedido;
           // Obtener los datos adicionales necesarios (por ejemplo, cliente, insumos, servicios, etc.)
           $cliente = $invoice->pedido->user; // Suponiendo que el cliente está asociado al pedido
           $insumos = $invoice->pedido->productos; // Suponiendo que los insumos están asociados al pedido
           $servicios = []; // Obtener los servicios asociados a la factura

// dd($pedido);
        // $pdf = pdf::loadView('pdf.invoice', compact('invoice'));
        $pdf = pdf::loadView('pdf.invoice', compact('invoice','pedido', 'cliente', 'insumos', 'servicios'));



        // $pdf = Pdf::loadView('livewire.invoices.table');

        //dd("en dowload pedido pdf", $pdf);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'factura_' . $invoice->id . '.pdf');
    }


    public function render()
    {
        return view('livewire.invoices.table');
    }
}
