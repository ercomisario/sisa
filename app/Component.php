<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public $timestamps = false;
        
    public function presentations(){
        return $this->hasMany('App\Presentation');
    }
}
