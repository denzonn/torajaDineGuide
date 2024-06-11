<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kuliner_type',
        'is_halal',
        'longitude',
        'latitude',
    ];

    public function review(){
        return $this->hasMany(CafeReview::class);
    }
}
