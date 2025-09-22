<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Contact Page')]

class Contacts extends Component
{
    public ContactForm $form;

    public function createNewMessage()
    {

        $this->form->store();

        session()->flash('success', 'Message has been sent.');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
