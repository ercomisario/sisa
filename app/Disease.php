<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public $timestamps = false;

    public function diseaseClasification(){
        return $this->belongsTo('App\DeseaseClasification');
    }

    public function medicalReports(){
        return $this->hasMany('App\MedicalReport');
    }
}
