<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinship extends Model
{
    //pertenece a una persona
    public function person(){
        return $this->belongsTo('App\Person');
    }
}
