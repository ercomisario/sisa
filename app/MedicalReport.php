<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    public function medicalConsultation(){
        return $this->belongsTo('App\MedicalConsultation');
    }

    public function clinicalCase(){
        return $this->hasOne('App\ClinicalCase');
    }

    public function admission(){
        return $this->hasOne('App\Admission');
    }

    public function disease(){
        return $this->belongsTo('App\Disease');
    }
}
