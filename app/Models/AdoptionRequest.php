<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function  dog(){
        return $this->belongsTo(dog::class);

    }
    public  function  user(){
        return $this->belongsTo(User::class);

    }

}
