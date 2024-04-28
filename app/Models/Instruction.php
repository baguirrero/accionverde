<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    //Relacion de uno a muchos
    public function person(){
        return $this->hasMany('App\Models\Person');
    }
}
