<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    use HasFactory;

    protected $guarded=[];
    // To accept images on database
    public function getImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public  function  dog(){
        return $this->hasMany(AdoptionRequest::class);

    }
    public  function user(){
        return $this->belongsTo(User::class);
    }


}
