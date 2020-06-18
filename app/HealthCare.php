<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthCare extends Model
{
    //reslaciones
    public function medicalOrder(){
        return $this->belongsTo('App\MedicalOrder');
    }

    public function nurses(){
        return $this->belongsToMany('App\Nurse')->withPivot('observation','status')->withTimestamps();
    }
}
