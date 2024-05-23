<?php

namespace App\Http\Livewire\Users;

use app\Enums\ActionType as EnumsActionType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateOrUpdate extends Component
{
    public $isOpen = false;
    public User $user;
    public $password;
    public $action = EnumsActionType::Create;

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
        return view('livewire.users.create-or-update');
    }

    public function openForm($userId)
    {
        if ($userId) {
            $this->user = User::where('id', $userId)->firstOrFail();
            $this->action = ActionType::Update->value;
        } else {
            $this->user = new User();
            $this->action = ActionType::Create->value;
        }

        $this->resetErrorBag();
        $this->password = null;
        $this->isOpen = true;


    }

    public function save()
    {
        if ($this->action == ActionType::Update->value && $this->user->id) {
            $this->rules['user.email'] =  'required|string|email|max:255|unique:users,email,'.$this->user->id;
            $this->rules['password'] =  'nullable|string|min:8|max:255';
        }

        $this->validate();
        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();
        $this->emit('user-saved');
        $this->resetFields();
    }

    public  function resetFields()
    {
        $this->isOpen = false;
        $this->password = '';
        $this->resetErrorBag();
        $this->user = new User();
    }
}
