<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $isOpen = false;
    public User $user;
    public $password;

    protected $listeners = ['open-form' => 'openForm'];
    protected $rules = [
        'user.name' => 'required|string|max:50',
        'user.apellidos' => 'required|string|max:50',
        'user.rol' => 'required|string|max:15',
        'user.email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|max:255',
    ];
    public function mount()
    {
        $this->user = new User();
    }
    public function render()
    {
        return view('livewire.users.create');
    }

    public function openForm()
    {
        $this->isOpen = true;
    }

    public function save()
    {
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        $this->isOpen = false;

        $this->emit('user-created');
    }
}
