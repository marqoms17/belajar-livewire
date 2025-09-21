<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Page')]

class About extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="text-center mt-30">
            <p class="text-3xl font-semibold">About Page</p>
        </div>

        HTML;
    }
}
