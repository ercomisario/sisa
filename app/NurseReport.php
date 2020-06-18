<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NurseReport extends Model
{
    //relaciones
    public function nurse(){
        return $this->belongsTo('App\Nurse');
    }

    public function clinicalCase(){
        return $this->belongsTo('App\ClinicalCase');
    }
}
