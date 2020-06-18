<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorMedicalCenter extends Model
{
    //relaciones
       public function doctors(){
        return $this->belongsToMany('App\Doctor')->as('entrance')->withTimestamps();
    }

}
