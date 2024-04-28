<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //Relacion uno a uno
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //Relacion de uno a muchos inversa
    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    //Relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }
}
