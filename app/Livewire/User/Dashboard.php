<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $showModal = false;
    public $leads;


    public function mount()
    {
        $user = Auth::user();

        if ($user->phone == null) {
                redirect('update/information');
            }
        // if ($user->mode == 'Professional') {
        //     if ($user->phone == null) {
        //         redirect('update/information');
        //     }
        //     // else{
        //     //   redirect('user/dashboard');
        //     // }
        // } else {
        //     redirect('seller/dashboard');
        // }

        //fetch users serivices and fetch leads that belongs to the user
        // $this->leads = LeadInformation::whereIn('service_id', $user->services->pluck('id'))
        //     ->with('service') // eager load service
        //     ->get();


        // // Fetch leads that the user has not contacted yet
        // $this->leads = LeadInformation::whereIn('service_id', $user->services->pluck('id'))
        //     ->whereDoesntHave('users', function ($query) use ($user) {
        //         // $query->where('user_id', $user->id);
        //         $query->where('user_leads.user_id', $user->id)
        //             ->where('user_leads.status', 'contacted');
        //     })

        //     ->with('service')
        //     ->withCount([
        //         'users as contacted_count' => function ($query) {
        //             $query->where('user_leads.status', 'contacted');
        //         },
        //     ])
        //     ->get();
    }

    


    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
