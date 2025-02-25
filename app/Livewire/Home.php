<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $title = 'Dashboard';
    public function render()
    {
        return view('livewire.home')
        ->layout('components.layouts.app', ['title' => $this->title, 'isPortal' => true]);
    }
}
