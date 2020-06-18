<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalCenter extends Model
{
    //relaciones
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function secretaries(){
        return $this->hasMany('App\Secretary');
    }

    public function doctors(){
        return $this->belongsToMany('App\Doctor')->as('entrance')->withPivot('shift_id')->withTimestamps();
    }

    public function nurses(){
        return $this->belongsToMany('App\Nurse')->as('entrance')->withTimestamps();
    }
    public function addAddress(){
        $this->address = $this->location()->first()->home.' '.$this->location()->first()->calle.' '
        .$this->location()->first()->sector()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->state()->first()->name; 
    }
}
