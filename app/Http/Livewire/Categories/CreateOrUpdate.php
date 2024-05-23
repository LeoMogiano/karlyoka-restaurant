<?php

namespace App\Http\Livewire\Categories;

use App\Enums\ActionType;
use App\Models\Categoria;
use Livewire\Component;

class CreateOrUpdate extends Component
{
    public $isOpen = false;
    public Categoria $category;
    public $action = ActionType::Create;

    protected $listeners = ['open-form' => 'openForm'];
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
        return view('livewire.categories.create-or-update');
    }

    public function save()
    {
        if ($this->action == ActionType::Update->value && $this->category->id) {
            $this->rules['category.nombre'] =  'required|string|max:50|unique:categorias,nombre,'.$this->category->id;
            $this->rules['category.descripcion'] =  'required|string|max:255';
        } 
        $this->validate();
        $this->category->save();
        $this->isOpen = false;
        $this->emit('category-saved');
        $this->resetFields();
    }

    public function openForm($categoryId)
    {
        if ($categoryId) {
            $this->category = Categoria::where('id', $categoryId)->firstOrFail();
            $this->action = ActionType::Update->value;
        } else {
            $this->category = new Categoria();
            $this->action = ActionType::Create->value;
        }

        $this->resetErrorBag();
        $this->isOpen = true;
    }

    public function resetFields()
    {
        $this->resetErrorBag();
        $this->category = new Categoria();
        $this->category->nombre = ''; 
        $this->category->descripcion = '';    
    }

}
