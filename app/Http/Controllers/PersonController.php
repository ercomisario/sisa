<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Person;
use App\ClinicalCase;

class PersonController extends Controller
{
    
    public function calculateAge($birthday){
        $dateOfBirth = $birthday;
        $today = date('Y-m-d');
        $diff = date_diff(date_create($dateOfBirth),date_create($today));
        return $diff->format('%y');
    }   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $user=$request->user();
        $person=$user->person;
        //$clinicalCase= $person->medicalRecord->clinicalCases;
        $person['age']=$this->calculateAge($person->birthday);
        if($person->clinicalCases){
            $clinicalCases = $person->clinicalCases()->get();
            foreach($clinicalCases as $clinicalCase){
                $clinicalCase->cardInfo();
            }
           
        }
        else{
            $clinicalCases = false;
        }
        //return $person;
        return view('person.medical-history',compact(['user','person','clinicalCases']));
        //return view('person.profile',compact(['user','person']));
        //View::share(compact(['user','person']));
    }
    public function show(Person $person, Request $request){
        $person['age']=$this->calculateAge($person->birthday);
        $user = $person->user;
        $person->location = $person->location()->first()->home.'  '.$person->location()->first()->calle.'  '
        .$person->location()->first()->sector()->first()->name.'  '
        .$person->location()->first()->sector()->first()->parish()->first()->name.' , '
        .$person->location()->first()->sector()->first()->parish()->first()->city()->first()->name.' , '
        .$person->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->name.' , '
        .$person->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->state()->first()->name;;
        
        //AQUI ESTUVO MIGUEL
        if($person->clinicalCases){
            $clinicalCases = $person->clinicalCases()->get()->last();
            if(!empty($clinicalCases)){
                $clinicalCases->cardInfo();
            }
        }
        else{
            $clinicalCases = false;
        }

        // FIN DE AQUI ESTUVO MIGUEL
        if (($request->user()->id == $person->user->id) && ($request->user()->role_id == 2)) {
            $doctor = $person->doctor;
            return view('person.profile', compact(['user', 'person', 'doctor','clinicalCases']));
        }
        else if($request->user()->id == $person->user->id)
        {
            
            return view('person.profile',compact(['user','person','clinicalCases']));
        
        }
        
        return redirect('person/'.$request->user()->id);
        
         
    }
    public function vista(Request $request){
        $user=$request->user();

        if($user->role_id ==1 ){
            return redirect('/person');
        }elseif ($user->role_id==2) {
            return redirect('/doctor');
        }elseif ($user->role_id==3) {
            return redirect('/nurse/health-care');
        }
    }

    //funcion para la busqueda autocompletada
    public function search(Request $request)
    {
        $q=$request->search;
        $patients = Person::where('name', 'LIKE', '%' . $q . '%')
        ->orWhere('cedula', 'LIKE', '%' . $q . '%')
        ->orWhere('last_name', 'LIKE', '%' . $q . '%')->get();
    return \response()->json($patients);
    }

    public function patientFormSearch(Request $request){
        $query = $request->cedula;
        $person = Person::where('cedula',$query)->get();
        $response = array();
        if(count($person) > 0){
            $response['success'] = true;
            $data[] = array(
                'street' =>$person->first()->location()->first()->calle,
                'sector' =>$person->first()->location()->first()->sector()->first()->name,
                'parish' =>$person->first()->location()->first()->sector()->first()->parish()->first()->name,
                'city' =>$person->first()->location()->first()->sector()->first()->parish()->first()->city()->first()->name,
                'municipality' =>$person->first()->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->name,
                'state' =>$person->first()->location()->first()->sector()->first()->parish()->first()->city()->first()->municipality()->first()->state()->first()->name,
                'email' =>$person->first()->user()->first()->email,
                'phone' =>$person->first()->phone,
                'social_number' =>$person->first()->social_number,
                'person_name' =>$person->first()->name,
                'last_name' =>$person->first()->last_name,
                'sexo' =>$person->first()->sexo,
                'birthday' =>$person->first()->birthday,
                'blood_type'=>$person->first()->blood_type
            );
            $response['message']= $data;
            echo json_encode($response);
        }else{
            $response['success'] = false;
            $response['message'] = "Nadie con la cédula: ".$request->cedula;
            echo json_encode($response);
        }
        
    }//patientFormSearch
}
