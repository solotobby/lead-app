<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceQuestion;
use App\Models\ServiceQuestionOptions;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $companies = [];
    public $selectedCompany = null;
    public $question;
    public $selectedCompanyId = null;
    public $serviceQuestions = null;
    public $options = ['']; // default with one empty input

    public function mount()
    {

        $list = Service::all();
        // Dummy data - ideally from DB
        $this->companies = $list;
    }

    public function selectCompany($id)
    {
        $this->selectedCompany = collect($this->companies)->firstWhere('id', $id);
        $this->selectedCompanyId = $id;
        $this->serviceQuestions = ServiceQuestion::with('options')->where('service_id', $id)->orderBy('created_at', 'DESC')->get();

        // dd($this->serviceQuestions);
        //$this->serviceQuestionOptions = ServiceQuestionOptions::where('service_id', $id)->where('service_question_id', )


    }

    public function createQuestion(){
        
        $this->validate([
            'question' => 'required|min:5',
            'selectedCompanyId' => 'required|exists:services,id',
            'options.*' => 'required|string|min:1',
        ]);

        $saveQuestion = ServiceQuestion::create(['service_id' => $this->selectedCompanyId, 'question' => $this->question]);
          foreach ($this->options as $opt) {
                ServiceQuestionOptions::create(['service_id' => $this->selectedCompanyId, 'service_question_id' => $saveQuestion->id, 'option' => $opt]);
          }
       
        $this->reset(['question', 'options']);
        $this->options = [''];

        session()->flash('success', 'Question submitted successfully.');

    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // reindex to keep keys clean
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
