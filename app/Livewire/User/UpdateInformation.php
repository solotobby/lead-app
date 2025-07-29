<?php

namespace App\Livewire\User;

use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateInformation extends Component
{
    public $phone; 
    public $company_name;
    public $website;
    public $description;
    public $services = [];
    public $serviceList;

   
    public function mount(){
        $this->serviceList = Service::all();
    }
    
    public function UpdateInformation(){

        $user = Auth::user();
        $this->validate([
        'phone' => [
            'required',
            'min:10',
            Rule::unique('users', 'phone')->ignore($user->id),
        ],

        'company_name' => 'required|min:2',
        'website' => 'nullable|url',
        'description' => 'required|min:10',
        'services' => 'required|array|min:1',
    ], [
        'phone.unique' => 'Phone number already exists.',
        'phone.required' => 'Phone number is required.',
        'company_name.required' => 'Company name is required.',
        'description.required' => 'Please enter a description.',
        'services.required' => 'Please select at least one service.',
    ]);
        
        $user = Auth::user();
        $userInfo = User::where('id', $user->id)->first();
        $userInfo->phone = $this->phone;
        $userInfo->company_name = $this->company_name;
        $userInfo->website = $this->website;
        $userInfo->description = $this->description;
        $userInfo->location = 'Worldwide';
        $userInfo->save();

        // dd($this->services);

        foreach($this->services as $service){
            UserService::create(['user_id'=>$user->id, 'service_id' => $service]);
        }
       
        return redirect('dashboard');
        session()->flash('success', 'Information saved successfully!');
    }

    public function render()
    {
        return view('livewire.user.update-information');
    }
}
