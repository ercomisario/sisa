<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name'
    ];
    //tiene muchos usuarios
    public function users(){
        return $this->hasMany('App\User');
    }

}
