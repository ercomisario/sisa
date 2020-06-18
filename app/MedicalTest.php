<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    //relaciones
    public function medicalOrder(){
        return $this->belongsTo('App\MedicalOrder');
    }

    public function nurses(){
        return $this->belongsToMany('App\Nurse')->withPivot('file')->withTimestamps();
    }
}
