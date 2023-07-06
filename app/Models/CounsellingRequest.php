<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'counseling_purpose',
        'user_id',
        'requester_id',
        'requested_date',
        'urgency'
    ];

    public function requester()
    {
        return $this->belongsTo(Prospect::class, 'requester_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
