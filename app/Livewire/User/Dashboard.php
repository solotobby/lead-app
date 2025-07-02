<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public $showModal = false;

    public function mount(){
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
