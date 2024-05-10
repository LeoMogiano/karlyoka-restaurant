<?php

namespace App\Http\Livewire\Categories;

use App\Models\Categoria;
use Livewire\Component;

class Create extends Component
{
    public $isOpen = false;
    public Categoria $category;

    protected $listeners = ['toogle-form' => 'toogleForm'];
    protected $rules = [
        'category.nombre' => 'required|string|max:50',
        'category.descripcion' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->category = new Categoria();
    }
    
    public function render()
    {
        return view('livewire.categories.create');
    }

    public function save()
    {
        $this->validate();
        $this->category->save();
        $this->clearForm();
        $this->isOpen = false;
        $this->emit('category-created');
    }

    public function toogleForm()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function clearForm()
    {
        $this->category = new Categoria();
        $this->category->nombre = ''; 
        $this->category->descripcion = ''; 
    }

}
