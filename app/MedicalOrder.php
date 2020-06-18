<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalOrder extends Model
{
    //relaciones
    public function clinicalCase(){
        return $this->belongsTo('App\ClinicalCase');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function referral(){
        return $this->hasOne('App\Referral');
    }

    public function medicalTest(){
        return $this->hasOne('App\MedicalTest');
    }

    public function healthCare(){
        return $this->hasOne('App\HealthCare');
    }

    public function medicalDischarge(){
        return $this->hasOne('App\MedicalDischarge');
    }

    public function medication(){
        return $this->hasOne('App\Medication');
    }
}
