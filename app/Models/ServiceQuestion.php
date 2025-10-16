<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestion extends Model
{
    protected $fillable = ['service_id', 'mode', 'question'];

    public function options(){
        return $this->hasMany(ServiceQuestionOptions::class);
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function answers(){
        return $this->hasMany(ServiceQuestionAnswer::class, 'service_question_id');
    }   

}
