<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Leads extends Component
{
      public $showModal = false;
    public $leads;


    public function mount()
    {
        $user = Auth::user();
         // Fetch leads that the user has not contacted yet
        $this->leads = LeadInformation::whereIn('service_id', $user->services->pluck('id'))
            ->whereDoesntHave('users', function ($query) use ($user) {
                // $query->where('user_id', $user->id);
                $query->where('user_leads.user_id', $user->id)
                    ->where('user_leads.status', 'contacted');
            })

            ->with('service')
            ->withCount([
                'users as contacted_count' => function ($query) {
                    $query->where('user_leads.status', 'contacted');
                },
            ])
            ->get();
    }

    public function makePayment()
    {
        //process payement, if successful add credit to user account

        $this->addCredit(1); // for now add 1 quantity of credit
        dd('credited added');
        //dd('add payment integration here');
    }

    public function addCredit($quantity)
    {
        $defaultCredit = 450;
        $creditPurchased = $defaultCredit * $quantity;
        $user = Auth::user();
        $user->credit += $creditPurchased;
        $user->save();

        return response()->json(['status' => true, 'message' => 'Credit added successfully.', 'new_credit' => $user->credit]);
    }

    public function contactLead($code)
    {


        $user = Auth::user();
        $lead = LeadInformation::where('code', $code)->first();

        if (!$lead) {
            session()->flash('error', 'Lead not found.');
            return;
        }

        if ($user->credit < $lead->credit) {
            session()->flash('error', 'Insufficient credits to contact this lead.');
            return;
        }

        // Deduct credits
        $user->credit -= $lead->credit;
        $user->save();

        // User::find($user->id)->leads()->attach($lead->id, ['status' => 'contacted']);

        User::find($user->id)->leads()->syncWithoutDetaching([
            $lead->id => ['status' => 'contacted']
        ]);

        return redirect("seller/leads/$code");
    }

    public function firstName($name){
        $parts = explode(' ', $name);
        return $parts[0];
    }


    public function render()
    {
        return view('livewire.user.leads');
    }
}
