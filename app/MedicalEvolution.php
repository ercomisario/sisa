<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalEvolution extends Model
{
    //relaciones
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function clinicalCase(){
        return $this->belongsTo('App\ClinicalCase');
    }
}
