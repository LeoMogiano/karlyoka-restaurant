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
    public $confirmDeletionIsOpen = false;
    public $categorySelected = null;
    protected $listeners = ['category-created' => 'mount'];

    public function mount()
    {
        $this->categories = Categoria::all();
    }

    public function deleteCategory($category)
    {
        $this->categorySelected = $category;
        $this->confirmDeletionIsOpen = true;
    }

    public function confirmUserDeletion($id)
    {
        Categoria::destroy($id);

        $this->categories = $this->categories->reject(function ($category) use ($id) {
            return $category->id == $id;
        });

        $this->categorySelected = null;
        $this->confirmDeletionIsOpen = false;
    }

    public function render()
    {
        return view('livewire.categories.table');
    }
}
