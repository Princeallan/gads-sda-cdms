<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'is_active',
        'hemisphere_id'
    ];

    public function hemisphere()
    {
        return $this->belongsTo(Hemisphere::class, 'hemisphere_id');
    }
}
