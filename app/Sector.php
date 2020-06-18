<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name',
        'parish_id'
    ];

    //relacion tiene muchas locations
    public function locations(){

        return $this->hasMany('App\Location');
    }
    //relacion pertenece a una parroquia
    public function parish(){

        return $this->belongsTo('App\Parish');
    }
}
