<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestionAnswer extends Model
{
    protected $fillable = ['service_id', 'service_question_id', 'service_question_option_id', 'lead_information_id', 'user_id'];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function question(){
        return $this->belongsTo(ServiceQuestion::class, 'service_question_id');
    }

    public function option(){
        return $this->belongsTo(ServiceQuestionOptions::class, 'service_question_option_id');
    }

    public function lead(){
        return $this->belongsTo(LeadInformation::class, 'lead_information_id');
    }
    
}
