<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
		$user = $request->user();
		$person = $user->person;
		$nurse = $person->nurse;
        return view('nurse.medication',compact(['user','person','nurse']));
	}
	
	public function healthCare(Request $request){
		$user = $request->user();
		$person = $user->person;
		$nurse = $person->nurse;
        return view('nurse.health-care',compact(['user','person','nurse']));
	}
	public function patientEvolution(Request $request){
		$user = $request->user();
		$person = $user->person;
		$nurse = $person->nurse;
        return view('nurse.patient-evolution',compact(['user','person','nurse']));
	}
	public function vitalSign(Request $request){
		$user = $request->user();
		$person = $user->person;
		$nurse = $person->nurse;
        return view('nurse.vital-sign',compact(['user','person','nurse']));
	}
	public function medicationView(Request $request)
	{
		$user = $request->user();
		$person = $user->person;
		$nurse = $person->nurse;
		return view('nurse.medication', compact(['user', 'person', 'nurse']));
	}
    public function patientDischarge(Request $request)
    {
        $user = $request->user();
        $person = $user->person;
        $nurse = $person->nurse;
        return view('nurse.patient-discharge', compact(['user', 'person', 'nurse']));
    }

    public function getPaciente(Request $request)
    {
    	# code...

    	$users = DB::table('people')->select('people.id as person_id','people.name','people.last_name','people.birthday','clinical_cases.id as clinical_case_id','people.cedula')
    	         ->Join('medical_consultations', 'people.id', '=', 'medical_consultations.person_id')
    	         ->Join('medical_records', 'people.id', '=', 'medical_records.person_id')
    	         ->Join('clinical_cases', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
    	         ->Join('medical_reports', 'medical_consultations.id', '=', 'medical_reports.medical_consultation_id')
    	         ->Join('admissions', 'medical_reports.id', '=', 'admissions.medical_report_id') 
    	         ->where('clinical_cases.status','=','1')
                 ->whereRaw('(SELECT COUNT(*) FROM medical_orders join medical_discharges on medical_discharges.medical_order_id = medical_orders.id  WHERE medical_orders.clinical_case_id = clinical_cases.id ) = 0 ')
                 ->groupBy('person_id','people.cedula','people.name','people.last_name','people.birthday','clinical_case_id')   	         
    	         ->get();

    	$array=array();
    	for ($i=0; $i <count($users) ; $i++) { 
    		$aux = get_object_vars($users[$i]);
    		
    		$array[$i]['person_id'] = trim($aux['person_id']);

    		$arrayName = explode(" ",$aux['name']);
    		$array[$i]['name'] = trim($arrayName[0]);

    		$arrayLastName = explode(" ",$aux['last_name']);
    		$array[$i]['last_name'] = trim($arrayLastName[0]);

    		$array[$i]['clinical_case_id'] = trim($aux['clinical_case_id']);
            $array[$i]['cedula'] = trim($aux['cedula']);
    		
    		$array[$i]['edad'] = trim($this->CalculaEdad($aux['birthday']));
    	}

    	return $array;

    }

    public function getPacienteEgreso(Request $request)
    {
        # code...

        $users = DB::table('people')->select('people.id as person_id','people.name','people.last_name','people.birthday','clinical_cases.id as clinical_case_id','people.cedula')
                 ->Join('medical_consultations', 'people.id', '=', 'medical_consultations.person_id')
                 ->Join('medical_records', 'people.id', '=', 'medical_records.person_id')
                 ->Join('clinical_cases', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
                 ->Join('medical_reports', 'medical_consultations.id', '=', 'medical_reports.medical_consultation_id')
                 ->Join('admissions', 'medical_reports.id', '=', 'admissions.medical_report_id') 
                 ->Join('medical_orders', 'clinical_cases.id', '=', 'medical_orders.clinical_case_id')               
                 ->Join('medical_discharges', 'medical_orders.id', '=', 'medical_discharges.medical_order_id')               
                 ->where('clinical_cases.status','=','1')
                 ->groupBy('person_id','people.cedula','people.name','people.last_name','people.birthday','clinical_case_id','clinical_cases.id')                
                 ->get();

        $array=array();
        for ($i=0; $i <count($users) ; $i++) { 
            $aux = get_object_vars($users[$i]);
            
            $array[$i]['person_id'] = trim($aux['person_id']);

            $arrayName = explode(" ",$aux['name']);
            $array[$i]['name'] = trim($arrayName[0]);

            $arrayLastName = explode(" ",$aux['last_name']);
            $array[$i]['last_name'] = trim($arrayLastName[0]);

            $array[$i]['clinical_case_id'] = trim($aux['clinical_case_id']);
            $array[$i]['cedula'] = trim($aux['cedula']);
            
            $array[$i]['edad'] = trim($this->CalculaEdad($aux['birthday']));
        }

        return $array;

    }

    public function CalculaEdad($fecha){
    	list($ano,$mes,$dia) = explode("-",$fecha);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0)
			$ano_diferencia--;
		return $ano_diferencia;
    }

    public function getPacienteId(Request $request){

    	$json = $request->datos;

    	$users = DB::table('people')
    			->select('people.id as person_id','people.name','people.cedula','people.last_name','people.birthday')
    	        ->where('id', '=', $json['person_id'])
    	        ->get();

    	
    	$arrayUser=array();
    	$aux = get_object_vars($users[0]);
		$arrayUser['person_id'] = trim($aux['person_id']);
		$arrayUser['name'] = $aux['name'];
        $arrayUser['cedula'] = $aux['cedula'];
		$arrayUser['last_name'] = $aux['last_name'];
		$arrayUser['edad'] = trim($this->CalculaEdad($aux['birthday']));
    	
		$arrayreporte=array();

		$reporte = DB::table('nurse_reports')
    			->select('nurse_reports.*','people.name','people.last_name')
    			->leftJoin('nurses', 'nurse_reports.nurse_id', '=', 'nurses.id')
    			->leftJoin('people', 'nurses.person_id', '=', 'people.id')
    	        ->where('nurse_reports.clinical_case_id', '=', $json['clinical_case_id'])
    	        ->get();


    	for ($i=0; $i <count($reporte) ; $i++) { 
    		# code...
    		$aux = get_object_vars($reporte[$i]);
	    	$array=array();

			$arrayName = explode(" ",$aux['name']);
			$name = trim($arrayName[0]);

			$arrayLastName = explode(" ",$aux['last_name']);
			$last_name = trim($arrayLastName[0]);

			$arrayFechaInicio = explode(" ",$aux['created_at']);
        	$fecha = trim($arrayFechaInicio[0]);
        	$hora = trim($arrayFechaInicio[1]);

	    	$inf = array(
	    	    'fecha'   => $fecha,
	    	    'hora'  => $hora,
	    	    'observation' =>  $aux['observation'],
	    	    'name' => $name, 
	    	    'last_name' => $last_name 
	    	);

	    	array_push($arrayreporte,$inf);
    	}

		$array = array("users" => $arrayUser, "reporte" => $arrayreporte);

    	return $array;
    }

    public function setEvolution(Request $request){
    	$json = $request->datos;    	

    	$fecha = date('Y-m-d');
    	$hora = date('H:i:s');

    	$datos = array(
    	    'created_at'   => date('Y-m-d H:i:s'),
    	    'updated_at'  => date('Y-m-d H:i:s'),
    	    'observation'  => $json['descripcion'],
    	    'clinical_case_id' =>  $json['id_caso_clinico'],
    	    'nurse_id' => $json['id_enfermera'] 
    	);

    	DB::table('nurse_reports')->insert($datos);  

    	$users = DB::table('people')->select('people.name','people.last_name')
                 ->leftJoin('nurses', 'people.id', '=', 'nurses.person_id')
                 ->where('nurses.id', '=', $json['id_enfermera'])
                 ->get();

        $aux = get_object_vars($users[0]);
    	$array=array();

		$arrayName = explode(" ",$aux['name']);
		$name = trim($arrayName[0]);

		$arrayLastName = explode(" ",$aux['last_name']);
		$last_name = trim($arrayLastName[0]);

    	$inf = array(
    	    'fecha'   => $fecha,
    	    'hora'  => $hora,
    	    'observation'  => $json['descripcion'],
    	    'name' => $name, 
    	    'last_name' => $last_name 
    	);

    	return $inf;
    }

    public function getPacienteEgresoId(Request $request){
        $json = $request->datos;
        $users = DB::table('people')
                ->select('people.id as person_id','people.name','people.cedula','people.last_name','people.birthday')
                ->where('id', '=', $json['person_id'])
                ->get();

        
        $arrayUser=array();
        $aux = get_object_vars($users[0]);
        $arrayUser['person_id'] = trim($aux['person_id']);
        $arrayUser['name'] = $aux['name'];
        $arrayUser['cedula'] = $aux['cedula'];
        $arrayUser['last_name'] = $aux['last_name'];
        $arrayUser['edad'] = trim($this->CalculaEdad($aux['birthday']));

        $egreso = DB::table('clinical_cases')->select('clinical_cases.id as clinical_case_id','medical_discharges.final_diagnostic','medical_discharges.summary','medical_discharges.type','medical_discharges.type')
            ->Join('medical_orders', 'clinical_cases.id', '=', 'medical_orders.clinical_case_id')               
            ->Join('medical_discharges', 'medical_orders.id', '=', 'medical_discharges.medical_order_id')               
            ->where('clinical_cases.status','=','1')
            ->where('clinical_cases.id','=',$json['clinical_case_id'])
            ->get();

        $health_cares = DB::table('medical_orders')->select('health_cares.*')
            ->Join('health_cares', 'medical_orders.id', '=', 'health_cares.medical_order_id')               
            ->Join('clinical_cases', 'medical_orders.clinical_case_id', '=', 'clinical_cases.id')               
            ->where('clinical_cases.status','=','1')
            ->where('medical_orders.status_discharge','=','1')
            ->where('clinical_cases.id','=',$json['clinical_case_id'])
            ->get();

        $medical_tests = DB::table('medical_orders')->select('medical_tests.*')
            ->Join('medical_tests', 'medical_orders.id', '=', 'medical_tests.medical_order_id')               
            ->Join('clinical_cases', 'medical_orders.clinical_case_id', '=', 'clinical_cases.id')               
            ->where('clinical_cases.status','=','1')
            ->where('medical_orders.status_discharge','=','1')
            ->where('clinical_cases.id','=',$json['clinical_case_id'])
            ->get();

        return array("users" => $arrayUser, "egreso" => get_object_vars($egreso[0]),"health_cares" => $health_cares,"medical_tests" => $medical_tests);

    }

    public function setPacienteEgreso(Request $request){
        $json = $request->datos;

       
        $medical_orders = DB::table('medical_orders')->select('medical_orders.id as medical_order_id','medical_discharges.id as medical_discharge_id')
            ->Join('medical_discharges', 'medical_orders.id', '=', 'medical_discharges.medical_order_id')
            ->where('clinical_case_id','=',$json['clinical_case_id'])
            ->get();

        $medical_order_id = get_object_vars($medical_orders[0]);

        $datos = array(
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            'medical_discharge_id'  => $medical_order_id['medical_discharge_id'],
            'nurse_id'  => $json['nurse_id'],
            'status'  => 0
            
        );

        DB::table('medical_discharge_nurse')->insert($datos);  

        $datos = array(
            'status' => 0
        );

        // DB::table('medical_tests')
        //      ->where('medical_order_id', '=', $medical_order_id['medical_order_id'])
        //      ->update($datos);

        // DB::table('health_cares')
        //      ->where('medical_order_id', '=', $medical_order_id['medical_order_id'])
        //      ->update($datos);

        // DB::table('medications')
        //      ->where('medical_order_id', '=', $medical_order_id['medical_order_id'])
        //      ->update($datos);

       return DB::table('clinical_cases')
             ->where('id', '=', $json['clinical_case_id'])
             ->update($datos);
    }


}
