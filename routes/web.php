<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/users', \App\Http\Livewire\Users\View::class)->name('users');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/categories', \App\Http\Livewire\Categories\View::class)->name('categories');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/products', \App\Http\Livewire\Products\View::class)->name('products');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/orders', \App\Http\Livewire\Orders\View::class)->name('orders');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/invoices', \App\Http\Livewire\Invoices\View::class)->name('invoices');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/invoices/{invoice}/download', function ($invoiceId) {
    $invoice = \App\Models\Factura::where('id', $invoiceId)->firstOrFail();
    
    $pedido = $invoice->pedido;
    $cliente = $invoice->pedido->user; 
    $insumos = $invoice->pedido->productos; 
    $servicios = [];

    $pdf = PDF::loadView('pdf.invoice', compact('invoice','pedido', 'cliente', 'insumos', 'servicios'));
   
    return $pdf->download('factura_' . $invoice->id . '.pdf');
})->name('invoices.download');


//

