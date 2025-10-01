<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'is_active'];

    public function leads()
{
    return $this->hasMany(LeadInformation::class);
}

}
