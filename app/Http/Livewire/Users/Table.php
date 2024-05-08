<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $columns = [
        "email",
        "nombre",
        "apellidos",
        "rol",
    ];

    public $users = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users.table');
    }
}
