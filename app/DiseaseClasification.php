<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseClasification extends Model
{
    public $timestamps = false;

    public function speciality(){
        return $this->belongsTo('App\Speciality');
    }

    public function diseases(){
        return $this->hasMany('App\Disease');
    }
}
