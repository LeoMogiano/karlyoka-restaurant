<?php

namespace App\Http\Livewire\Orders;

use App\Enums\ActionType;
use App\Models\Factura;
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

    protected $rules = [];

    public function mount()
    {
        $this->productsOptions = Producto::all();
        $this->order = new Pedido();

        foreach ($this->productsOptions as $product) {
            $this->pedido_productos[$product->id] = 0;
        }
    }

    public function incrementCount($productId, $increment = true)
    {
        if (!isset($this->pedido_productos[$productId])) {
            $this->pedido_productos[$productId] = 0;
        }

        if ($increment) {
            $this->pedido_productos[$productId]++;
        } else {
            if ($this->pedido_productos[$productId] > 0) {
                $this->pedido_productos[$productId]--;
            }
        }
        $this->order->total = 0;
        foreach ($this->pedido_productos as $productId => $quantity) {
            $product = Producto::find($productId);
            $this->order->total += $product->precio * $quantity;
            $this->pedido_productos[$productId] = $quantity;
        }
    }

    public function render()
    {
        return view('livewire.orders.create-or-update');
    }

    public function save()
    {
        if ($this->action == ActionType::Update->value && $this->order->id) {
            dd('in1');
            if ($this->order->total <= 0) {
                return;
            }

            $this->order->save();
            $this->order->productos()->detach();
        }

        $this->order->total = 0;
        foreach ($this->pedido_productos as $productId => $quantity) {
            $product = Producto::find($productId);
            $this->order->total += $product->precio * $quantity;
        }

        if ($this->order->total <= 0) {
            return;
        }

        $this->order->nro = 'PED' . rand(100, 999) . chr(rand(65, 90)) . chr(rand(65, 90));
        $this->order->fecha_recepcion = now();
        $this->order->fecha_entrega = null;
        $this->order->user_id = auth()->id();
        $this->order->save();
        $this->order->nro = 'PED#' . $this->order->id;
        $this->order->save();

        foreach ($this->pedido_productos as $productId => $quantity) {
            if ($quantity > 0) {
                $this->order->productos()->attach($productId, [
                    'cantidad' => $quantity,
                    'subtotal' => Producto::find($productId)->precio * $quantity,
                ]);
            }
        }

        $preOrder = $this->order;

        $this->isOpen = false;
        $this->emit('order-loaded');
        $this->resetFields();
        ///here we create de invoice
       
        $this->emit('create-invoice', $preOrder->id);
    }

    public function openForm($orderId)
    {
        if ($orderId) {
            $this->order = Pedido::find($orderId);
            $this->action = ActionType::Update->value;
            $this->pedido_productos = Pedido::with('productos')->find($orderId)->productos->pluck('pivot.cantidad', 'id')->toArray();
        } else {
            $this->order = new Pedido();
            $this->action = ActionType::Create->value;
        }
        $this->isOpen = true;
    }

    public function resetFields()
    {
        $this->order = new Pedido();
        $this->pedido_productos = [];
        $this->action = ActionType::Create;
        $this->resetErrorBag();
    }
}
