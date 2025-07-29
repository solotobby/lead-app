<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestionAnswer extends Model
{
    protected $fillable = ['service_id', 'service_question_id', 'service_question_option_id', 'lead_information_id', 'user_id'];
}
