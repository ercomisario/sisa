<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $timestamps = false;

    public function doctors(){
        return $this->hasMany('App\Doctor');
    }

    public function diseaseClasifications(){
        return $this->hasMany('App\DiseaseClasification');
    }
}
