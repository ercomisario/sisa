<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Person;
use App\User;
class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     

    public function run()
    {
        
        App\Person::create([

            'name' =>'Ramón José',
            'last_name' =>'Ruiz Lopez',
            'cedula' =>'28417150',
            'birthday' =>'1997-05-06',
            'social_number' =>'0000003',
            'phone' =>'04248665647',
            'sexo' =>'Masculino',
            'blood_type_id' => 5,
            'location_id' => 14,
            'avatar_path' => (new Person)->generateAvatar('Ramón José', 'Ruiz Lopez', '28417150')
        ]);

        App\Person::create([
            'name' =>'Angel E',
            'last_name' =>'Pinto',
            'cedula' =>'12276078',
            'birthday' =>'1976-12-14',
            'social_number' =>'0000002',
            'phone' =>'04248045032',
            'sexo' =>'Masculino',
            'blood_type_id' => 4,
            'location_id' => 12,
            'avatar_path' => (new Person)->generateAvatar('Angel E', 'Pinto', '12276078')
        ]);

        App\Person::create([
            'name' =>'José Jhosue',
            'last_name' =>'Antón Bravo',
            'cedula' =>'17895342',
            'birthday' =>'1984-03-14',
            'social_number' =>'0000004',
            'phone' =>'04248045000',
            'sexo' =>'Masculino',
            'blood_type_id' => 2,
            'location_id' => 4,
            'avatar_path' => (new Person)->generateAvatar('José Jhosue', 'Antón Bravo', '17895342')
        ]);

        App\Person::create([
            'name' =>'María José',
            'last_name' =>'Oca Mon',
            'cedula' =>'24563478',
            'birthday' =>'1993-10-21',
            'social_number' =>'0000001',
            'phone' =>'0424701000',
            'sexo' =>'Femenino',
            'blood_type_id' => 2,
            'location_id' => 6,
            'avatar_path' => (new Person)->generateAvatar('María José', 'Oca Mon', '24563478')
        ]);

        App\Person::create([
            'name' =>'Manuel Vicente',
            'last_name' =>'España Albani',
            'cedula' =>'20375232',
            'birthday' =>'1991-02-28',
            'social_number' =>'0000008',
            'phone' =>'04261981719',
            'sexo' =>'Masculino',
            'blood_type_id' => 1,
            'location_id' => 11,
            'avatar_path' =>(new Person)->generateAvatar('Manuel Vicente','España Albani','20375232')
        ]);

        App\Person::create([
            'name' =>'Miguel David',
            'last_name' =>'Salazar Urreta',
            'cedula' =>'26545411',
            'birthday' =>'1998-02-20',
            'social_number' =>'0000009',
            'phone' =>'04248638913',
            'sexo' =>'Masculino',
            'blood_type_id' => 2,
            'location_id' => 1,
            'avatar_path' => (new Person)->generateAvatar('Miguel David', 'Salazar Urreta', '26545411')
        ]);

        App\Person::create([
            'name' =>'Wladimir José',
            'last_name' =>'Ramos Suarez',
            'cedula' =>'18417150',
            'birthday' =>'1987-05-06',
            'social_number' =>'0000010',
            'phone' =>'04248665646',
            'sexo' =>'Masculino',
            'blood_type_id' => 1,
            'location_id' => 1,
            'avatar_path' => (new Person)->generateAvatar('Wladimir José', 'Ramos Suarez', '18417150')
        ]);

        App\Person::create([
            'name' =>'Rosa María',
            'last_name' =>'Rojas Morao',
            'cedula' =>'11567905',
            'birthday' =>'1987-05-06',
            'social_number' =>'0000011',
            'phone' =>'04248665000',
            'sexo' =>'Femenino',
            'blood_type_id' => 1,
            'location_id' => 7,
            'avatar_path' => (new Person)->generateAvatar('Rosa María', 'Rojas Morao', '11567905')
        ]);

        App\Person::create([
            'name' =>'Luisa Antonia',
            'last_name' =>'Ramos  De Flores',
            'cedula' =>'8413150',
            'birthday' =>'1959-05-06',
            'social_number' =>'0000012',
            'phone' =>'04248660046',
            'sexo' =>'Femenino',
            'blood_type_id' => 5,
            'location_id' => 5,
            'avatar_path' => (new Person)->generateAvatar('Luisa Antonia', 'Ramos De Flores', '8413150')
        ]);

        App\Person::create([
            'name' =>'Rafael Luis',
            'last_name' =>'Ruiz  Lara',
            'cedula' =>'11413150',
            'birthday' =>'1982-01-10',
            'social_number' =>'0000013',
            'phone' =>'04245673246',
            'sexo' =>'Masculino',
            'blood_type_id' => 7,
            'location_id' => 8,
            'avatar_path' => (new Person)->generateAvatar('Rafael Luis', 'Ruiz Lara', '11413150')
        ]);
        

        App\Person::create([
            'name' =>'Rosa María',
            'last_name' =>'Rojas Morao',
            'cedula' =>'21567905',
            'birthday' =>'2001-05-06',
            'social_number' =>'0000038',
            'phone' =>'04262347893',
            'sexo' =>'Femenino',
            'blood_type_id' => 1,
            'location_id' => 7,
            'avatar_path' => (new Person)->generateAvatar('Rosa María', 'Rojas Morao', '21567905')
        ]);

        App\Person::create([
            'name' =>'Luis Antonio',
            'last_name' =>'Ramos  Flores',
            'cedula' =>'8413150',
            'birthday' =>'1992-05-03',
            'social_number' =>'0000021',
            'phone' =>'04142340046',
            'sexo' =>'Masculino',
            'blood_type_id' => 5,
            'location_id' => 5,
            'avatar_path' => (new Person)->generateAvatar('Luis Antonio', 'Ramos Flores', '8413150')
        ]);

        App\Person::create([
            'name' =>'Rafael Luis',
            'last_name' =>'Ruiz  Lara',
            'cedula' =>'23654150',
            'birthday' =>'1999-01-10',
            'social_number' =>'0000013',
            'phone' =>'04245673246',
            'sexo' =>'Masculino',
            'blood_type_id' => 7,
            'location_id' => 8,
            'avatar_path' => (new Person)->generateAvatar('Rafael Luis', 'Ruiz Lara', '23654150')
        ]);

        App\Person::create([

            'name' =>'Orgemis Trinidad',
            'last_name' =>'Garcia Cordova',
            'cedula' =>'14422954',
            'birthday' =>'1980-10-07',
            'social_number' =>'00000050',
            'phone' =>'04128342274',
            'sexo' =>'Femenino',
            'blood_type_id' => 5,
            'location_id' => 13,
            'avatar_path' => (new Person)->generateAvatar('Orgemis Trinidad', 'Garcia Cordova', '14422954') 
            ]);
            
    }
}
