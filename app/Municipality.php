<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    
    //relaciones
    //pertenece a un estado
    public function state(){
        return $this->belongsTo('App\State');
    }
    
    //tiene muchas ciudades
    public function cities(){
        return $this->hasMany('App\City');
    }
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name','state_id'
    ];
}
