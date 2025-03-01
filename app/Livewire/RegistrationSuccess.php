<?php

namespace App\Livewire;

use Livewire\Component;

class RegistrationSuccess extends Component
{
    public function render()
    {
        return view('livewire.registration-success')->layout('components.layouts.app', ['title' => "Setting Payment Gateway", 'isPortal' => false]);
    }
}
