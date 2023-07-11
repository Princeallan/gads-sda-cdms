<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FellowshipCertificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'thumbnail',
        'expiry_date',
        'description'
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class, 'hemisphere_id');
    }
}
