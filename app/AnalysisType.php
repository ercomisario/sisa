<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisType extends Model
{
    //relaciones
    public function analysisGroups(){
        return $this->hasMany('App\AnalysisGroup');
    }
}
