<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthCareController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getPaciente(Request $request){

		$users = DB::table('people')->select('people.id as person_id','people.name','people.last_name','people.birthday','health_cares.medical_order_id as medical_order_id','health_cares.id as health_care_id','health_cares.created_at as fecha_inicio','health_cares.description','doctors.id as doctor_id','people_doctor.last_name as doctor_name')
		         ->Join('medical_consultations', 'people.id', '=', 'medical_consultations.person_id')
		         ->Join('medical_records', 'people.id', '=', 'medical_records.person_id')
		         ->Join('clinical_cases', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
		         ->leftJoin('medical_reports', 'medical_consultations.id', '=', 'medical_reports.medical_consultation_id')
		         ->leftJoin('admissions', 'medical_reports.id', '=', 'admissions.medical_report_id')    	         
		         ->Join('medical_orders', 'clinical_cases.id', '=', 'medical_orders.clinical_case_id')    	         
		         ->Join('health_cares', 'medical_orders.id', '=', 'health_cares.medical_order_id')    	         
		         ->Join('doctors', 'medical_orders.doctor_id', '=', 'doctors.id')    	         
		         ->Join('people as people_doctor', 'doctors.person_id', '=', 'people_doctor.id')    	         
		         ->where('clinical_cases.status','=','1')
                 ->where('health_cares.status','=','1')
                 ->where('medical_orders.status_discharge','=','0')
                 ->groupBy('person_id','people.name','people.last_name','people.birthday','medical_order_id','health_care_id','fecha_inicio','health_cares.description','doctor_id','doctor_name')
		         ->get();

		$array=array();
		for ($i=0; $i <count($users) ; $i++) { 
			$aux = get_object_vars($users[$i]);
			
			$array[$i]['person_id'] = trim($aux['person_id']);

			$arrayName = explode(" ",$aux['name']);
			$array[$i]['name'] = trim($arrayName[0]);

			$arrayLastName = explode(" ",$aux['last_name']);
			$array[$i]['last_name'] = trim($arrayLastName[0]);

			$arrayFechaInicio = explode(" ",$aux['fecha_inicio']);
        	$fecha = trim($arrayFechaInicio[0]);
        	$hora = $this->hora12(trim($arrayFechaInicio[1]));
			
			$array[$i]['edad'] = trim($this->CalculaEdad($aux['birthday']));
			$array[$i]['medical_order_id'] = trim($aux['medical_order_id']);
			$array[$i]['health_care_id'] = trim($aux['health_care_id']);
			$array[$i]['description'] = trim($aux['description']);
			$array[$i]['fecha'] = $fecha;
			$array[$i]['hora'] = $hora;
			$array[$i]['doctor_id'] = trim($aux['doctor_id']);
			$array[$i]['doctor_name'] = trim($aux['doctor_name']);
		}

		return $array;
	}


    public function hora12($hora){
    	return  date("g:i a",strtotime($hora));
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
    	
    	$health_cares = DB::table('health_cares')
    	        ->where('id', '=', $json['health_care_id'])
    	        ->get();
    	$arrayHealthcares = get_object_vars($health_cares[0]);

		$arrayHealthcaresReg=array();

		$HealthcaresReg = DB::table('health_care_nurse')
    			->select('health_care_nurse.*','people.name','people.last_name')
    			->leftJoin('nurses', 'health_care_nurse.nurse_id', '=', 'nurses.id')
    			->leftJoin('people', 'nurses.person_id', '=', 'people.id')
    	        ->where('health_care_nurse.health_care_id', '=', $json['health_care_id'])
    	        ->get();


    	for ($i=0; $i <count($HealthcaresReg) ; $i++) { 
    		# code...
    		$aux = get_object_vars($HealthcaresReg[$i]);

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
	    	    'observation'  => $aux['observation'],
	    	    'name' => $name, 
	    	    'last_name' => $last_name 
	    	   
	    	);

	    	array_push($arrayHealthcaresReg,$inf);
    	}

		$array = array("users" => $arrayUser, "healthcaresID" => $arrayHealthcares, "healthcaresReg" => $arrayHealthcaresReg);

    	return $array;
    }

    public function setHealthCare(Request $request){
    	$json = $request->datos;    	

    	$fecha = date('Y-m-d');
    	$hora = date('H:i:s');

    	$datos = array(
    	    'created_at'   => date('Y-m-d H:i:s'),
    	    'updated_at'  => date('Y-m-d H:i:s'),
    	    'observation'  => $json['observation'],
    	    'status'  => $json['aplicado'],
    	    'nurse_id'  => $json['nurse_id'],
    	    'health_care_id'  => $json['health_care_id'],
    	    
    	);

    	DB::table('health_care_nurse')->insert($datos);  

    	$users = DB::table('people')->select('people.name','people.last_name')
                 ->leftJoin('nurses', 'people.id', '=', 'nurses.person_id')
                 ->where('nurses.id', '=', $json['nurse_id'])
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
    	    'observation'  => $json['observation'],
    	    'name' => $name, 
    	    'last_name' => $last_name 
    	   
    	);

    	return $inf;
    }

}
