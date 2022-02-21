<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Definir constantes para variable status
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

     //relación uno a muchos
     public function reviews(){
        return $this->hasMany('App\Models\Review');
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
}
