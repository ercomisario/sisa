<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantItemGroup extends Model
{
    public function anamnesisObservations(){
        return $this->hasMany('App\ImportantAnamnesisObservation');
    }
    
    public function analysisGroup(){
        return $this->belongsTo('App\AnalysisGroup');
    }
}
