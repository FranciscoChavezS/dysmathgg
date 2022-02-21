<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

     //Relación uno a muchos 
     public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    //relación uno a muchos inversa
    public function sections(){
        return $this->belongsTo('App\Models\Course');
    }
}
