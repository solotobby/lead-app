<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestionOptions extends Model
{
    protected $fillable = ['service_id', 'service_question_id', 'option'];

    
}
