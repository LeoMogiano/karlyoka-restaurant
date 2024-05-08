<?php

namespace App\Http\Livewire\Categories;

use App\Models\Categoria;
use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $columns = [
        "nombre",
        "descripcion",
    ];

    public $categories = [];

    public function mount()
    {
        $this->categories = Categoria::all();
    }

    public function render()
    {
        return view('livewire.categories.table');
    }
}
