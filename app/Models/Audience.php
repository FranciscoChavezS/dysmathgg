<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    //relación uno a muchos inversa
    public function sections(){
        return $this->belongsTo('App\Models\Course');
    }
}
