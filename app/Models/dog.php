<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'age',
        'weight',
        'breed',
        'gender',
        'vaccinated',
        'description',
        'user_id',
    ];
    // To accept images on database
    public function getImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
