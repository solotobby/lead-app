<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLead extends Model
{
    protected $table = 'user_leads';

    protected $fillable = [
        'user_id',
        'lead_id',
        'status', // e.g., 'contacted', 'pending', etc.
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lead()
    {
        return $this->belongsTo(LeadInformation::class, 'lead_id');
    }
}
