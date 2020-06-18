<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'calle',
        'home',
        'sector_id'
    ];

    //relacion tiene a una persona
    public function person(){

        return $this->hasOne('App\Person');
    }
    //tiene un cento medico
    public function medicalCenter(){
        return $this->hasOne('App\MedicalCenter');
    }
    //relacion pertenece a un sector
    public function sector(){
        
        return $this->belongsTo('App\Sector');
    }
}
