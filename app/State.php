<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //funciones de relacion
    //estado tiene muchos municipios
    public function municipalities(){
        return $this->hasMany('App\Municipality');
    }
   
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name'
    ];
}
