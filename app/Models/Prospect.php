<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'division_id',
        'hemisphere_id',
        'location_id',
        'user_id',
        'is_active'
    ];

    public function hemisphere()
    {
        return $this->belongsTo(Hemisphere::class, 'hemisphere_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
