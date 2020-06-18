<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    //relaciones
    public function anamnesisObservations(){
        return $this->hasMany('App\AnamnesisObservation');
    }
    
    public function analysisGroup(){
        return $this->belongsTo('App\AnalysisGroup');
    }
}
