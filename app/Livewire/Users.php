<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    public function createNewUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(); //untuk menghapus inputan di form setelah disubmit
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::all(),
        ]);
    }
}
