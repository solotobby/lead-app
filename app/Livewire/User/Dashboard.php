<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $showModal = false;
    public $leads;


    public function mount()
    {
        $user = Auth::user();

        if ($user->mode == 'Buyer') {
            if ($user->phone == null) {
                redirect('update/information');
            }
            // else{
            //   redirect('user/dashboard');
            // }
        } else {
            redirect('seller/dashboard');
        }

        //fetch users serivices and fetch leads that belongs to the user
        $this->leads = LeadInformation::whereIn('service_id', $user->services->pluck('id'))
            ->with('service') // eager load service
            ->get();
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
