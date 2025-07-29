<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $showModal = false;
    

    public function mount(){
        $user = Auth::user();

        if($user->mode == 'Buyer'){
            if($user->phone == null){
                redirect('update/information');
            }else{
                redirect('dashboard');
            }
        }else{
            redirect('seller/dashboard');
        }
        
        // $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
