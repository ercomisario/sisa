<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    
    //relaciones
    //pertenece a una ciudad
    public function city(){
        return $this->belongsTo('App\City');
    }

    //tiene muchos sectores
    public function sectors(){

        return $this->hasMany('App\Sector');
    }
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name','city_id'
    ];
}
