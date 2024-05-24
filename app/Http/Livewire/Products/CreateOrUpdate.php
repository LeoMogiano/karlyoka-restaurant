<?php

namespace App\Http\Livewire\Products;

use App\enums\ActionType;
use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class CreateOrUpdate extends Component
{
    public $isOpen = false;
    public Producto $product;
    public $action = ActionType::Create;
    public $categoriesOptions = [];

    protected $listeners = ['open-form' => 'openForm'];
    protected $rules = [
        'product.nombre' => 'required|string|max:30',
        'product.descripcion' => 'required|string|max:50',
        'product.precio' => 'required|numeric',
        'product.image_url' => 'required|string',
        'product.categoria_id' => 'required|exists:categorias,id',
    ];

    public function mount()
    {
        $this->categoriesOptions = Categoria::all();
        $this->product = new Producto();
    }
    
    public function render()
    {
        return view('livewire.products.create-or-update');
    }

    public function save()
    {
        if ($this->action == ActionType::Update->value && $this->product->id) {
            $this->rules['product.nombre'] = 'required|string|max:30';
            $this->rules['product.descripcion'] =  'required|string|max:50';
            $this->rules['product.precio'] =  'required|numeric';
            $this->rules['product.image_url'] =  'required|string';
            $this->rules['product.categoria_id'] =  'required|exists:categorias,id';
            
        } 
        $this->validate();
        $this->product->save();
        $this->isOpen = false;
        $this->emit('product-loaded');
        $this->resetFields();
    }

    public function openForm($productId)
    {
        if ($productId) {
            $this->product = Producto::find($productId);
            $this->action = ActionType::Update->value;
        } else {
            $this->product = new Producto();
            $this->action = ActionType::Create->value;
        }

        $this->resetErrorBag();
        $this->isOpen = true;
    }

    public function resetFields()
    {
        $this->resetErrorBag();
        $this->product = new Producto();
        $this->product->nombre = ''; 
        $this->product->descripcion = ''; 
        $this->product->precio = '';
        $this->product->image_url = '';
        $this->product->categoria_id = '';
    }

}
