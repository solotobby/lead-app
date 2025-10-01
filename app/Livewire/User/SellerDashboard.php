<?php

namespace App\Livewire\User;

use App\Models\LeadInformation;
use App\Models\Service;
use App\Models\ServiceQuestion;
use App\Models\ServiceQuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SellerDashboard extends Component
{
    public $services;

    public $selectedService;
    public $questions = [];
    public $answers = [];
    public $currentIndex = 0;
    public $validationError = null;
    public $myServices;


    public function mount()
    {
        $user = Auth::user();
        $this->services = Service::all();
        $this->myServices = LeadInformation::where('user_id', $user->id)->with('service')->latest()->get();
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


        $userId = Auth::id();

        $lead = LeadInformation::create(['user_id' => $userId, 'service_id' => $this->selectedService->id, 'code' => 'LEAD' . strtoupper(uniqid()), 'credit' => 0.00]);
        if ($lead) {
            foreach ($this->questions as $question) {
                $questionId = $question->id;
                $selected = $this->answers[$questionId] ?? null;

                // Skip if no answer (you may handle required validation elsewhere)
                if (!$selected) continue;

                // Normalize for checkbox (array) and radio (scalar)
                if (is_array($selected)) {
                    $selectedOptions = array_keys(array_filter($selected));
                } else {
                    $selectedOptions = [$selected];
                }


                foreach ($selectedOptions as $optionId) {
                    ServiceQuestionAnswer::create([
                        'service_id' => $question->service_id,
                        'user_id' => $userId,
                        'service_question_id' => $questionId,
                        'service_question_option_id' => $optionId,
                        'lead_information_id' => $lead->id
                    ]);
                }
            }

            $lead->credit = 5.00; // Assign initial credit value
            $lead->save();

            session()->flash('success', 'Your answers have been submitted!');
            $this->reset(['answers', 'currentIndex']);

            // TO DO: Send email to user on creation of lead
            //  Mail::to(Auth::user()->email)->send(new LeadCreatedMail($lead));

            //TO DO: notfiy admin of new lead creation
            // Notification::send(User::where('role', 'admin')->get(), new NewLeadCreated($lead));

            redirect('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.user.seller-dashboard');
    }
}
