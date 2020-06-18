<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamnesisRecord extends Model
{
    
    //relaciones
    public function clinicalCase(){
        return $this->belongsTo('App\ClinicalCase');
    }

    public function anamnesisObservations(){
        return $this->hasMany('App\AnamnesisObservation');
    }

    public function importantAnamnesisObservations(){
        return $this->hasMany('App\ImportantAnamnesisObservation');
    }

}
