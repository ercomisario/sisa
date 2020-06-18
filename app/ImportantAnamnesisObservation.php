<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantAnamnesisObservation extends Model
{
    public function anamnesisRecord(){
        return $this->belongsTo('App\AnamnesisRecord');
    }

    public function importantItemGroup(){
        return $this->belongsTo('App\ImportantItemGroup');
    }

    public function medicalRecord(){
        return $this->belongsTo('App\MedicalRecord');
    }
}
