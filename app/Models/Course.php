<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    //Definir constantes para variable status
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

     //relación uno a muchos
     public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

     //relación uno a muchos
     public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    //relación uno a muchos
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    //relación uno a muchos
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    //relación uno a muchos
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }


    //relación uno a muchos inverso
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //relación uno a muchos inverso
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    //relación uno a muchos inverso
    public function category(){
        return $this->belongsTo('App\Models\Level');
    }

    //relación uno a muchos inverso
    public function price(){
        return $this->belongsTo('App\Models\Level');
    }

     //relación muchos a muchos 
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relación uno a uno polimorfica

    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
