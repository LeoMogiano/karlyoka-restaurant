<?php

namespace App\Http\Livewire\Categories;

use App\Models\Categoria;
use Livewire\Component;

class Table extends Component
{
    public $columns = [
        "nombre",
        "descripcion",
    ];

    public $categories = [];

    protected $listeners = ['category-saved' => 'mount'];

    public function mount()
    {
        $this->categories = Categoria::all();
    }

    public function render()
    {
        return view('livewire.categories.table');
    }
}
