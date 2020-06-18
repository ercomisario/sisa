<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    public function person(){
        return $this->belongsTo('App\Person');
    }
    
    public function medicalCenter(){
        return $this->belongsTo('App\MedicalCenter');
    }
    public function appointments(){
        return $this->hasMany('App\Appointment');
    }
}
