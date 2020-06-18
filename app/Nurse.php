<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    //relaciones
    public function person(){
        return $this->belongsTo('App\Person');
    }

    public function medicalCenters(){
        return $this->belongsToMany('App\MedicalCenter')->as('entrance')->withTimestamps();
    }

    public function nurseReports(){
        return $this->hasMany('App\NurseReport');
    }

    public function vitalSigns(){
        return $this->hasMany('App\VitalSign');
    }

    public function medicalTests(){
        return $this->belongsToMany('App\MedicalTest')->withPivot('file')->withTimestamps();
    }

    public function healthCares(){
        return $this->belongsToMany('App\HealthCare')->withPivot('observation','status')->withTimestamps();
    }

    public function medicalDischarges(){
        return $this->belongsToMany('App\MedicalDischarge')->withPivot('status')->withTimestamps();
    }

    public function medications(){
        return $this->belongsToMany('App\Medications')->withPivot('observation','status')->withTimestamps();
    }

}
