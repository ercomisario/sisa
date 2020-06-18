<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //pertenece a una person
     public function person(){
        return $this->belongsTo('App\Person');
    }
    
    //pertenece a un rol
     public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'the action is unauthorize');
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this-hasRole($role)){
                    return true;
                } 
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    /**esta funcion me determina si un usuario tiene un role */
    public function hasRole($role){

        if($this->role()->where('name',$role)->first()){
            return true;
        }
        return false;

    }

    protected $fillable = [
        'name', 
        'email', 
        'password',   
        'email_verified_at', 
        'remember_token',
        'person_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
