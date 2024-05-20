<?php

namespace App\Http\Livewire\Orders;

use App\Enums\ActionType;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Notifications\Action;
use Livewire\Component;

class CreateOrUpdate extends Component
{

    public $isOpen = false;
    public Pedido $order;
    public $action = ActionType::Create;
    public $productsOptions = [];

    public $pedido_productos = [];


    protected $listeners = ['open-form' => 'openForm'];

    protected $rules = [

        'order.nro' => 'required|integer|unique:pedidos,nr_pedido',
        'order.fecha_recepcion' => 'required|date',
        'order.fecha_entrega' => 'required|date',
        'order.total' => 'required|numeric',
        'order.user_id' => 'required|exists:users,id',

    ];

    public function mount()
    {
        $this->productsOptions = Producto::all();
        $this->order = new Pedido();

        foreach ($this->productsOptions as $product) {
            $this->pedido_productos[$product->id] = 0; // Inicializar cantidades a 0
        }
    }

    public function incrementQuantity($productId)
    {
        if (!isset($this->pedido_productos[$productId])) {
            $this->pedido_productos[$productId] = 0;
        }
        $this->pedido_productos[$productId]++;
    }

    public function decrementQuantity($productId)
    {
        if (isset($this->pedido_productos[$productId]) && $this->pedido_productos[$productId] > 0) {
            $this->pedido_productos[$productId]--;
        }
    }


    public function render()
    {
        return view('livewire.orders.create-or-update');
    }

    public function save()
    {
        if ($this->action == ActionType::Update->value && $this->order->id) {
            $this->rules['order.nro'] = 'required|integer|unique:pedidos,nr_pedido,' . $this->order->id;
            $this->rules['order.fecha_recepcion'] = 'required|date';
            $this->rules['order.fecha_entrega'] = 'required|date';
            $this->rules['order.total'] = 'required|numeric';
            $this->rules['order.user_id'] = 'required|exists:users,id';
        }
        $this->validate();
        $this->order->save();
        $this->isOpen = false;
        $this->emit('order-loaded');
        $this->resetFields();
    }

    public function openForm($orderId)
    {
        if ($orderId) {
            $this->order = Pedido::find($orderId);
            $this->action = ActionType::Update->value;
        } else {
            $this->order = new Pedido();
            $this->action = ActionType::Create->value;
        }
        $this->isOpen = true;
    }

    public function resetFields()
    {
        $this->order = new Pedido();
        $this->action = ActionType::Create;
        $this->resetErrorBag();
    }
}
