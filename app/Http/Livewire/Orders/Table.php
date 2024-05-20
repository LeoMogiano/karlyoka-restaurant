<?php

namespace App\Http\Livewire\Orders;

use App\Models\Pedido;
use Livewire\Component;

class Table extends Component
{

    public $columns = [
        'id', 'nr_pedido', 'fecha_recepcion', 'fecha_entrega', 'total'
    ];
    public $orders = [];

    
    public $confirmDeletionIsOpen = false;
    public $orderSelected = null;

    protected $listeners = [
        'order-loaded' => 'mount'
    ];

    public function mount($searchText = null)
    {
        $this->orders =  Pedido::with('user')->when($searchText, function ($query, $searchText) {
            return $query->where('nr_pedido', 'like', "%$searchText%")
                ->orWhere('fecha_recepcion', 'like', "%$searchText%")
                ->orWhere('fecha_entrega', 'like', "%$searchText%")
                ->orWhere('total', 'like', "%$searchText%")
                ->orWhereHas('user', function ($query) use ($searchText) {
                    $query->where('name', 'like', "%$searchText%");
                });
        })->get();
        
    }

    public function deleteOrders($order)
    {
       if(!$this->confirmDeletionIsOpen) {
            $this->confirmDeletionIsOpen = true;
            $this->orderSelected = $order;
            return;
        } else {
            Pedido::destroy($order->id);

            $this->orders = $this->orders->reject(function ($item) use ($order) {
                return $item->id == $order->id;
            });

            $this->orderSelected = null;
            $this->confirmDeletionIsOpen = false;
        }

    }


    public function render()
    {
        return view('livewire.orders.table');
    }
}
