<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalConsultation extends Model
{
    //relaciones
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function attentionType(){
        return $this->belongsTo('App\AttentionType');
    }

    public function person(){
        return $this->belongsTo('App\Person');
    }

    public function secretary(){
        return $this->belongsTo('App\Secretary');
    }

    public function medicalCenter(){
        return $this->secretary->medicalCenter;
    }

    public function medicalReport(){
        return $this->hasOne('App\MedicalReport');
    }

    


}
