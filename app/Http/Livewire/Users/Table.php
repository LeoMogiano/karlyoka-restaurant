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
    protected $listeners = [
        'user-saved' => 'userCreated',
        'user-search' => 'searchUser'
    ];


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

    public function searchUser($searchText)
    {
        $this->loadAllUsers($searchText);
    }

    public function loadAllUsers($searchText = null)
    {
        $id = Auth::id();
        if ($searchText) {
            $this->users = User::where('id', '!=', $id)
                ->where(function($query) use ($searchText) {
                    $query->where('name', 'like', "%$searchText%")
                        ->orWhere('apellidos', 'like', "%$searchText%")
                        ->orWhere('email', 'like', "%$searchText%");
                })
                ->get();
        } else {
            $this->users = User::where('id', '!=', $id)->get();
        }
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
