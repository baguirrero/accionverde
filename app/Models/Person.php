<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id', 'status'];
    use HasFactory;

    const REGISTRADO = 1;
    const ASIGNADO = 2;
    const EN_PROCESO = 3;
    const RESUELTO = 4;

    //Relacion de uno a muchos inversa
    public function identity(){
        return $this->belongsTo('App\Models\Identity');
    }

    public function birthplace(){
        return $this->belongsTo('App\Models\BirthPlace');
    }

    public function employment(){
        return $this->belongsTo('App\Models\Employment');
    }

    public function homeplace(){
        return $this->belongsTo('App\Models\HomePlace');
    }

    public function instruction(){
        return $this->belongsTo('App\Models\Instruction');
    }

    public function maritalstatus(){
        return $this->belongsTo('App\Models\MaritalStatus');
    }

    public function profession(){
        return $this->belongsTo('App\Models\Profession');
    }

    public function son(){
        return $this->belongsTo('App\Models\Son');
    }
    
    //Relacion de uno a muchos
    public function events(){
        return $this->hasMany('App\Models\Event');
    }

}
