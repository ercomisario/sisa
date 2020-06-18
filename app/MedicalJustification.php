<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalJustification extends Model
{
    //relaciones
    public function clinicalCase(){
        return $this->belongsTo('App\ClinicalCase');
    }
}
