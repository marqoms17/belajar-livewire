<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $query = '';

    #[On('user-created')]

    public function updatedQuery()
    {
        $this->resetPage(); //reset dan mencari diseluruh halaman pencarian

    }

    public function search()
    {
        $this->resetPage(); //reset dan mencari diseluruh halaman pencarian
    }

    public function placeholder()
    {
        //menambahkan skeleton saat terjadi lazy loading
        return view('livewire.placeholders.skeleton');
    }

    //computed properties memungkinkan sebuah method dirubah menjadi public properties yang bisa diakses
    #[Computed]
    public function users()
    {
        return User::latest()
            ->where('name', 'like', "%{$this->query}%")
            ->paginate(6);
    }

    // public function render()
    // {
    //     // sleep(1);
    //     return view('livewire.users-list');
    // }
}
