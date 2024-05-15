<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    public $columns = [
        "email",
        "nombre",
        "apellidos",
        "rol",
    ];

    public $users = [];
    public $confirmDeletionIsOpen = false;
    public $userSelected = null;
    protected $listeners = ['user-created' => 'userCreated'];


    public function mount()
    {
        $this->loadAllUsers();
    }

    public function render()
    {
        return view('livewire.users.table');
    }

    public function userCreated()
    {
        $this->loadAllUsers();
    }

    public function loadAllUsers()
    {
        $id = Auth::id();
        $this->users = User::where('id', '!=', $id)->get();
    }

    public function deleteUser($user)
    {
        $this->userSelected = $user;
        $this->confirmDeletionIsOpen = true;
    }

    public function confirmUserDeletion($id)
    {
        User::destroy($id);

        $this->users = $this->users->reject(function ($user) use ($id) {
            return $user->id == $id;
        });

        $this->userSelected = null;
        $this->confirmDeletionIsOpen = false;
    }
}
