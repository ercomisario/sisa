<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    //relaciones
    //pertenece a un municipio
    public function municipality(){
        return $this->belongsTo('App\Municipality');
    }

    //tiene muchas parroquias
    public function parishs(){
        return $this->hasMany('App\Parish');
    }
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name',
        'municipality_id'
    ];
}
