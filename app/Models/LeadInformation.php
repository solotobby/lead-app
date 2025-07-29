<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadInformation extends Model
{
    protected $table = 'lead_informations';
    protected $fillable = ['user_id', 'service_id', 'code'];
}
