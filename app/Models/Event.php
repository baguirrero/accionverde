<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //Relacion de uno a muchos
    public function progress(){
        return $this->hasMany('App\Models\Progress');
    }

    //Relacion de uno a muchos inversa
    public function person(){
        return $this->belongsTo('App\Models\Person');
    }
}
