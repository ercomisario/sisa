<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    public $timestamps = false;

    public function people(){
        return $this->hasOne('App\Person');
    }
}