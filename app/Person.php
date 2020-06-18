<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class Person extends Model
{
    
    //campos para asignacion masiva para usar en los seeder
    protected $fillable = [

        'name',
        'last_name',
        'cedula',
        'birthday',
        'social_number',
        'phone',
        'sexo',
        'blood_type',
        'mail',
        'location_id',
        'avatar_path'
    ];
    
    //relaciones
    //pertenece a una location
    public function location(){
        return $this->belongsTo('App\Location');
    }
    //tipo de sangre
    public function bloodType(){
        return $this->belongsTo('App\BloodType');
    }

    //tiene un usuario
    public function User(){

        return $this->hasOne('App\User');
    }
    //tiene muchos parentescos
    public function kinships(){
        return $this->hasMany('App\Kinship');
    }
    //tiene relacion con secretaria
    public function secretary(){
        return $this->hasOne('App\Secretary');
    }
    //tiene relacion con doctor
    public function doctor(){
        return $this->hasOne('App\Doctor');
    }
    //tiene relacion con enfermera
    public function nurse(){
        return $this->hasOne('App\Nurse');
    }
    //tiene un registro medico
    public function medicalRecord(){
        return $this->hasOne('App\MedicalRecord');
    }
    //tiene muchas citas
    public function medicalConsultation(){
        return $this->hasMany('App\MedicalConsultation');
    }
    public function clinicalCases(){
        return $this->hasManyThrough('App\ClinicalCase', 'App\MedicalRecord');
    }
    public function addAddress(){
        $this->address = $this->location()->first()->home.' '.$this->location()->first()->calle.' '
        .$this->location()->first()->sector()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->name.' '
        .$this->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->state()->first()->name; 
    }

    public function generateAvatar($personName, $personLastName, $personIDNumber)
    {
        $im = imagecreatetruecolor(100, 100); //crea el tamaño de la imagen
        $white = imagecolorallocate($im, 255, 255, 255); //color blanco para el texto
        $c1 = mt_rand(50, 200); //red
        $c2 = mt_rand(50, 200); //green
        $c3 = mt_rand(50, 200); //blue
        $backgroundColor = imagecolorallocate($im, $c1, $c2, $c3); //color de fondo de la imagen aleatorio
        imagefilledrectangle($im, 0, 0, 100, 100, $backgroundColor); //rellena la imagen con color
        $firstLetter = substr($personName, 0, 1); //primera letra del nombre
        $secondLetter = substr($personLastName, 0, 1); //primera letra del apellido
        $text = $firstLetter . $secondLetter; //texto a escribir en la imagen
        $font = public_path('/fonts/Montserrat-Medium.ttf'); //fuente a usar
        $fontDebian = 'public/fonts/Montserrat-Medium.ttf'; //fuente a usar
        imagettftext($im, 30, 0, 15, 62, $white, $font, $text); //generar imagen
        imagepng($im, 'public/img/avatars/'.$personIDNumber.'.jpg'); //ruta y nombre del archivo a guardar
        //$path = Storage::put('avatars/1',$im);
        return ('public/img/avatars/' . $personIDNumber . '.jpg');
        imagedestroy($im); //destruye el stream
    }

}
