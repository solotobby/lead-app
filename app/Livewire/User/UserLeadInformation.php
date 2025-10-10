<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use Livewire\Component;

class UserLeadInformation extends Component
{
    public $lead;

    public function mount($lead)
    {
        $this->lead = LeadInformation::where('code', $lead)->first();
        if (!$this->lead) {
            abort(404);
        }
        $this->lead->load('service', 'user');
       
    }

    public function render()
    {
        return view('livewire.user.user-lead-information');
    }
}
