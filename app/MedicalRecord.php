<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    public function person(){
        return $this->belongsTo('App\Person');
    }
    
    public function clinicalCases(){
        return $this->hasMany('App\ClinicalCase');
    }

    public function importantAnamnesisObservations(){
        return $this->hasMany('App\importantAnamnesisObservation');
    }
}
