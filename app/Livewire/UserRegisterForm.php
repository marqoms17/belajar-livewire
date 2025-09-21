<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|unique:users|email:dns')]
    public $email = '';

    #[Validate('required|min:5')]
    public $password = '';

    #[Validate('image|max:2000')]
    public $avatar;

    public function createNewUser()
    {

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        $this->reset(); //untuk menghapus inputan di form setelah disubmit

        session()->flash('success', 'User succesfully created.');

        $this->dispatch('user-created'); //event untuk koneksi antar komponen
    }

    // public function render()
    // {
    //     return view(
    //         'livewire.user-register-form'
    //     );
    // }
}
