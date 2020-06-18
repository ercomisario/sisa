<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VitalSignController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getPaciente(Request $request){

    	$users = DB::table('people')->select('people.id as person_id','people.cedula','people.name','people.last_name','people.birthday','clinical_cases.id as clinical_case_id')
    	         ->Join('medical_consultations', 'people.id', '=', 'medical_consultations.person_id')
    	         ->Join('medical_records', 'people.id', '=', 'medical_records.person_id')
    	         ->Join('clinical_cases', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
    	         ->Join('medical_reports', 'medical_consultations.id', '=', 'medical_reports.medical_consultation_id')
    	         ->Join('admissions', 'medical_reports.id', '=', 'admissions.medical_report_id')    	         
                 ->groupBy('person_id','people.cedula','people.name','people.last_name','people.birthday','clinical_case_id')
                 ->whereRaw('(SELECT COUNT(*) FROM medical_orders join medical_discharges on medical_discharges.medical_order_id = medical_orders.id  WHERE medical_orders.clinical_case_id = clinical_cases.id ) = 0 ')
    	         ->where('clinical_cases.status','=','1')
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

    public function getEnfermera(Request $request){

    	$json = $request->datos;

    	$users = DB::table('people')->select('people.name','people.last_name')
                 ->leftJoin('nurses', 'people.id', '=', 'nurses.person_id')
                 ->where('nurses.id', '=', $json['id_enfermera'])
                 ->get();

        $aux = get_object_vars($users[0]);
    	$array=array();

		$arrayName = explode(" ",$aux['name']);
		$array['name'] = trim($arrayName[0]);

		$arrayLastName = explode(" ",$aux['last_name']);
		$array['last_name'] = trim($arrayLastName[0]);
		
		$array['fecha'] = date('Y-m-d');
		$array['hora'] = date('H:i:s');
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
    			->select('people.id as person_id','people.name','people.last_name','people.cedula','people.birthday')
    	        ->where('id', '=', $json['person_id'])
    	        ->get();

    	
    	$arrayUser=array();
    	$aux = get_object_vars($users[0]);
		$arrayUser['person_id'] = trim($aux['person_id']);
		$arrayUser['name'] = $aux['name'];
        $arrayUser['cedula'] = $aux['cedula'];
		$arrayUser['last_name'] = $aux['last_name'];
		$arrayUser['edad'] = trim($this->CalculaEdad($aux['birthday']));
    	
		$arrayVitalSign=array();

		$vitalsign = DB::table('vital_signs')
    			->select('vital_signs.*','people.name','people.last_name')
    			->leftJoin('nurses', 'vital_signs.nurse_id', '=', 'nurses.id')
    			->leftJoin('people', 'nurses.person_id', '=', 'people.id')
    	        ->where('vital_signs.clinical_case_id', '=', $json['clinical_case_id'])
    	        ->get();


    	for ($i=0; $i <count($vitalsign) ; $i++) { 
    		# code...
    		$aux = get_object_vars($vitalsign[$i]);
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
	    	    'temperatura'  => $aux['temperatura'],
	    	    'pulse'  => $aux['pulse'],
	    	    'respiratory_rate' =>  $aux['respiratory_rate'],
	    	    'max_t' =>  $aux['max_t'],
	    	    'min_t' =>  $aux['min_t'],
	    	    'name' => $name, 
	    	    'last_name' => $last_name 
	    	);

	    	array_push($arrayVitalSign,$inf);
    	}

		$array = array("users" => $arrayUser, "vitalsign" => $arrayVitalSign);

    	return $array;
    }

    public function setVitalSign(Request $request){
    	$json = $request->datos;    	

    	$fecha = date('Y-m-d');
    	$hora = date('H:i:s');

    	$datos = array(
    	    'created_at'   => date('Y-m-d H:i:s'),
    	    'updated_at'  => date('Y-m-d H:i:s'),
    	    'temperatura'  => $json['temp'],
    	    'pulse'  => $json['pulso'],
    	    'respiratory_rate' =>  $json['resp'],
    	    'max_t' =>  $json['max'],
    	    'min_t' =>  $json['min'],
    	    'clinical_case_id' =>  $json['id_caso_clinico'],
    	    'nurse_id' => $json['id_enfermera'] 
    	);

    	DB::table('vital_signs')->insert($datos);  

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
    	    'temperatura'  => $json['temp'],
    	    'pulse'  => $json['pulso'],
    	    'respiratory_rate' =>  $json['resp'],
    	    'max_t' =>  $json['max'],
    	    'min_t' =>  $json['min'],
    	    'name' => $name, 
    	    'last_name' => $last_name 
    	);

    	return $inf;
    }

}
