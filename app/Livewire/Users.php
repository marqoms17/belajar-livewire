<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class Users extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|unique:users|email:dns')]
    public $email = '';

    #[Validate('required|min:5')]
    public $password = '';

    public function createNewUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(); //untuk menghapus inputan di form setelah disubmit

        session()->flash('success', 'User succesfully created.');
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::all(),
        ]);
    }
}
