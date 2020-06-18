<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //relaciones
    public function medicalOrder(){
        return $this->belongsTo('App\MedicalOrder');
    }

    public function doctors(){
        return $this->belongsToMany('App\Doctor')->withPivot('diagnostic', 'observation')->withTimestamps();
    }
}
