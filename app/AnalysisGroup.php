<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisGroup extends Model
{
    //relaciones
    public function analysisType(){
        return $this->belongsTo('App\AnalysisType');
    }

    public function itemGroups(){
        return $this->hasMany('App\ItemGroup');
    }

    public function importantItemGroups(){
        return $this->hasMany('App\ImportantItemGroup');
    }
}
