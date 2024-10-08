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

    public $confirmDeletionIsOpen = false;
    public $categorySelected = null;

    protected $listeners = [
        'category-saved' => 'mount',
        'category-search' => 'searchCategories',
    ];

    public function searchCategories($searchText) {
        $this->mount($searchText);
    }

    public function mount($searchText = null)
    {
        $this->categories = Categoria::when($searchText, function ($query) use ($searchText) {
            return $query->where('nombre', 'like', '%' . $searchText . '%')
                         ->orWhere('descripcion', 'like', '%' . $searchText . '%');
        })->get();
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
