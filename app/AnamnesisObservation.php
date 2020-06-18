<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamnesisObservation extends Model
{
    //relaciones
    public function anamnesisRecord(){
        return $this->belongsTo('App\AnamnesisRecord');
    }

    public function itemGroup(){
        return $this->belongsTo('App\ItemGroup');
    }
}
