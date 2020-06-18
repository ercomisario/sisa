<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\MedicalConsultation;

class SecretaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $user = $request->user();
        $person = $user->person;
        $secretary = $person->secretary;

        //$request = $request;
        return view('secretary.appointment-controls', compact(['user','person','secretary']));
    }
    public function search(Request $request){
        $q = $request->busqueda;
        $user = Person::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('cedula', 'LIKE', '%' . $q . '%')
                ->orWhere('last_name', 'LIKE', '%' . $q . '%')->get();
        if (count($user) > 0)
            return view('person.search')->withDetails($user)->withQuery($q);
        else 
            return view('person.search')->withMessage('No encontrado');
    }//search
    public function appointmentList(Request $request){
        if(!(isset($request->fecha))){
          $request->fecha = date("Y-m-d");
        }
        $q = $request->fecha;
        if($q != NULL){
            //falta añadir doesntHave(medical report) en consulta
           $appointments = MedicalConsultation::where('agreeded_date','LIKE','%'.$q.'%')->get();
            $response = array();
            if(count($appointments) > 0){
                foreach ($appointments as $appointment => $items) {
                    $data[] = array(
                        'appointment_id' => $items->id,
                        'appointment_time' => date("g:i a",strtotime($items->agreeded_date)),
                        'doctor_last_name' => $items->doctor()->first()->person()->first()->last_name,
                        'doctor_name' => $items->doctor()->first()->person()->first()->name,
                        'doctor_specialty' => $items->doctor()->first()->speciality()->first()->name,
                        'patient_cedula' => $items->person()->first()->cedula,
                        'patient_last_name' => $items->person()->first()->last_name,
                        'patient_name' => $items->person()->first()->name
                    );
                }
                $response['success'] = true;
                $response['response'] = $data;
                echo json_encode($response);
            }else{
                $response['success'] = false;
                echo json_encode($response);
            }
        }
    }//appointmentList

    public function patientForm(Request $request){
        $user = $request->user();
        $person = $user->person;
        $secretary = $person->secretary;
        //echo $user;
        return view('secretary.patient-form', compact(['user','person','secretary']));
    }//patientForm
}
