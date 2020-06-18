<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //relaciones
    public function person(){
        return $this->belongsTo('App\Person');
    }

    public function speciality(){
        return $this->belongsTO('App\Speciality');
    }

    public function medicalCenters(){
        return $this->belongsToMany('App\MedicalCenter')->as('entrance')->withPivot('shift_id')->withTimestamps();
    }

    public function medicalConsultations(){
        return $this->hasMany('App\MedicalConsultation');
    }

    public function medicalEvolutions(){
        return $this->hasMany('App\MedicalEvolution');
    }

    public function medicalOrders(){
        return $this->hasMany('App\MedicalOrder');
    }

    public function referrals(){
        return $this->belongsToMany('App\Referral')->withPivot('diagnostic', 'observation')->withTimestamps();
    }









}
