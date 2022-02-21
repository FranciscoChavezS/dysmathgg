<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    //relación uno a muchos inversa
    public function sections(){
        return $this->belongsTo('App\Models\Course');
    }
}
