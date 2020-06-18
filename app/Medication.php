<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    //reslaciones
    public function medicalOrder(){
        return $this->belongsTo('App\MedicalOrder');
    }

    public function nurses(){
        return $this->belongsToMany('App\Nurse')->withPivot('observation','status')->withTimestamps();
    }
    
    public function presentation(){
        return $this->belongsTo('App\Presentation');
    }

}
