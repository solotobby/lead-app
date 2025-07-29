<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestion extends Model
{
    protected $fillable = ['service_id', 'mode', 'question'];

    public function options(){
        return $this->hasMany(ServiceQuestionOptions::class);
    }
}
