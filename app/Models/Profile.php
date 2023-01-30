<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function getCityAttribute($value)
    {
        return ucfirst($value);
    }
    public function getCountryAttribute($value)
    {
        return ucfirst($value);
    }
    protected $fillable = [
        'age',
        'from',
        'sex',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
