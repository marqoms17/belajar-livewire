<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Users extends Component
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
        // sleep(2);

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
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::all(),
        ]);
    }
}
