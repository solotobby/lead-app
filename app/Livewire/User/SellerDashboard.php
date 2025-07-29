<?php

namespace App\Livewire\User;

use App\Models\Service;
use App\Models\ServiceQuestion;
use Livewire\Component;

class SellerDashboard extends Component
{
    public $services;

    public $selectedService;
    public $questions = [];
    public $answers = [];
    public $currentIndex = 0;
    public $validationError = null;

 


    public function mount(){
        $this->services = Service::all();
    }

     public function showServiceQuestions($serviceId)
    {
        $this->selectedService = Service::findOrFail($serviceId);
        $this->questions = ServiceQuestion::with('options')->where('service_id', $serviceId)->latest()->get();
        $this->currentIndex = 0;

    }

    
    public function nextQuestion()
    {
        $this->validationError = null;

        $currentQuestion = $this->questions[$this->currentIndex];
        $questionId = $currentQuestion->id;

        // Check if answer exists
        if (!isset($this->answers[$questionId]) || empty($this->answers[$questionId])) {
            $this->validationError = "Please select at least one option to continue.";
            return;
        }

        // Proceed if valid
        if ($this->currentIndex + 1 < count($this->questions)) {
            $this->currentIndex++;
        }

        // if ($this->currentIndex < count($this->questions) - 1) {
        //     $this->currentIndex++;
        // }
    }

    public function prevQuestion()
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
        }
    }

    public function submitAnswers()
    {

        $this->validationError = null;

        $currentQuestion = $this->questions[$this->currentIndex];
        $questionId = $currentQuestion->id;

        // Check if answer exists
        if (!isset($this->answers[$questionId]) || empty($this->answers[$questionId])) {
            $this->validationError = "Please select at least one option to continue.";
            return;
        }

        dd('submitted');




    }

    public function render()
    {
        return view('livewire.user.seller-dashboard');
    }
}
