<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    public $timestamps = false;
    
    public function medication(){
        return $this->hasOne('App\Medication');
    }

    public function component(){
        return $this->belongsTo('App\Component');
    }
    
    public function administerRoute(){
        return $this->belongsTo('App\AdministerRoute');
    }

    public function presentationType(){
        return $this->belongsTo('App\PresentationType');
    }

}
