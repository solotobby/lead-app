<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use App\Models\User;
use App\Models\UserLead;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class UserLeads extends Component
{

    public $conversations;

    public function mount()
    {
        $this->conversations = UserLead::with(['lead', 'user'])->where('user_id', auth()->user()->id)->where('status', 'contacted')->get();
        dd($this->conversations);
    }


    public function render()
    {
        return view('livewire.user.user-leads');
    }
}
