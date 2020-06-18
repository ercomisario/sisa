<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalDischarge extends Model
{
    //reslaciones
    public function medicalOrder(){
        return $this->belongsTo('App\MedicalOrder');
    }

    public function nurses(){
        return $this->belongsToMany('App\Nurse')->withPivot('status')->withTimestamps();
    }

}
