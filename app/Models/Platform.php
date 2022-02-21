<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relación uno a muchos
    public function lessons(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
