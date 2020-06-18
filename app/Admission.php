<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    public function medicalReport(){
        return $this->belongsTo('App\MedicalReport');
    }
}
