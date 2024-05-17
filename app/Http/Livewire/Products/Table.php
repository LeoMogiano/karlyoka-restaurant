<?php

namespace App\Http\Livewire\Products;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class Table extends Component
{
    public $columns = [
        'nombre', 'descripcion', 
        'precio', 'stock',
        'image_url', 'categoria_id'
    ];

    public $products = [];
  

    public $confirmDeletionIsOpen = false;
    public $productSelected = null;

    protected $listeners = [
        'product-loaded' => 'mount'
    ];

    public function mount($searchText = null)
    {
        

        $this->products =  Producto::with('categoria')->when($searchText, function ($query, $searchText) {
            return $query->where('nombre', 'like', "%$searchText%")
                ->orWhere('descripcion', 'like', "%$searchText%")
                ->orWhere('precio', 'like', "%$searchText%")
                ->orWhere('stock', 'like', "%$searchText%")
                ->orWhereHas('categoria', function ($query) use ($searchText) {
                    $query->where('nombre', 'like', "%$searchText%");
                });
        })->get();
        
    }

    public function deleteProducts($product)
    {
       if(!$this->confirmDeletionIsOpen) {
            $this->confirmDeletionIsOpen = true;
            $this->productSelected = $product;
            return;
        } else {
            Producto::destroy($product->id);

            $this->products = $this->products->reject(function ($item) use ($product) {
                return $item->id == $product->id;
            });

            $this->categorySelected = null;
            $this->confirmDeletionIsOpen = false;
        }

    }

    public function render()
    {
        return view('livewire.products.table');
    }
}
