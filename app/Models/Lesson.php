<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Recuperar registros de lecciones
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //Relación uno a uno  
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //Relación uno a muchos inversa 
    public function sections(){
        return $this->belongsTo('App\Models\Section');
    }

    //Relación uno a muchos inversa 
    public function platforms(){
        return $this->belongsTo('App\Models\Platform');
    }

     //Relación muchos a muchos  
     public function users(){
        return $this->belongsToMany('App\Models\User');
    }

     //Relación uno a uno polimórfica
     public function resource(){
        return $this->morphOne('App\Models\Resource','resourceable');
    }

     //Relación uno a muchos polimórfica
     public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }
    

}
