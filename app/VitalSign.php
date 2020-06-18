<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    //relaciones
    public function clinicalCase(){
        $this->belongsTo('App\ClinicalCase');
    }

    public function nurse(){
        $this->belongsTo('App\Nurse');
    }
}
