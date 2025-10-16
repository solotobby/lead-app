<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadInformation extends Model
{
    protected $table = 'lead_informations';
    protected $fillable = ['user_id', 'service_id', 'code', 'credit', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_leads', 'lead_id', 'user_id')
            ->withPivot('status')
            ->withTimestamps();
    }
    public function answers()
    {
        return $this->hasMany(ServiceQuestionAnswer::class, 'lead_information_id');
    }
}
