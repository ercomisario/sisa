<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttentionType extends Model
{
    public function medicalConsultations(){
        return $this->hasMany('App\MedicalConsultation');
    }
}
