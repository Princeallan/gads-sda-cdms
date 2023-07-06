<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hemisphere extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'is_active'
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class, 'hemisphere_id');
    }
}
