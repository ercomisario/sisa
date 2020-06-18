<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicationController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getPaciente(Request $request){

		$users = DB::table('people')->select('people.id as person_id','people.name','people.last_name','people.birthday','medications.medical_order_id as medical_order_id','medications.id as medication_id','medications.start_time as fecha_inicio','medications.end_time as fecha_fin','medications.dose','medications.name as medications','medications.frequency','doctors.id as doctor_id','people_doctor.last_name as doctor_name')
		         ->Join('medical_consultations', 'people.id', '=', 'medical_consultations.person_id')
		         ->Join('medical_records', 'people.id', '=', 'medical_records.person_id')
		         ->Join('clinical_cases', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
		         ->leftJoin('medical_reports', 'medical_consultations.id', '=', 'medical_reports.medical_consultation_id')
		         ->leftJoin('admissions', 'medical_reports.id', '=', 'admissions.medical_report_id')    	         
		         ->Join('medical_orders', 'clinical_cases.id', '=', 'medical_orders.clinical_case_id')    	         
		         ->Join('medications', 'medical_orders.id', '=', 'medications.medical_order_id')    	         
		         ->Join('doctors', 'medical_orders.doctor_id', '=', 'doctors.id')    	         
		         ->Join('people as people_doctor', 'doctors.person_id', '=', 'people_doctor.id')    	         
		         ->where('clinical_cases.status','=','1')
		         ->where('medications.status','=','1')
		         ->groupBy('person_id','people.name','people.last_name','people.birthday','medical_order_id','medication_id','fecha_inicio','fecha_fin','medications.dose','medications','medications.frequency','doctor_id','doctor_name')
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
        	$fechaInicio = trim($arrayFechaInicio[0]);
        	$hora = $this->hora12(trim($arrayFechaInicio[1]));
			
			$arrayFechaFin = explode(" ",$aux['fecha_fin']);
        	$fechaFin = trim($arrayFechaFin[0]);

			$array[$i]['edad'] = trim($this->CalculaEdad($aux['birthday']));
			$array[$i]['medical_order_id'] = trim($aux['medical_order_id']);
			$array[$i]['medication_id'] = trim($aux['medication_id']);
			$array[$i]['medicamento'] = trim($aux['medications']);
			$array[$i]['fecha_inicio'] = $fechaInicio;
			$array[$i]['fecha_fin'] = $fechaFin;
			$array[$i]['hora'] = $hora;
			$array[$i]['doctor_id'] = trim($aux['doctor_id']);
			$array[$i]['doctor_name'] = trim($aux['doctor_name']);
			$array[$i]['dosis'] = trim($aux['dose']);
			$array[$i]['frecuencia'] = trim($aux['frequency']);
			
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

		$medications = DB::table('medications')
			->select('medications.name as medicamento','medications.frequency as frecuencia','medications.dose as dosis','medications.start_time as fecha_inicio','medications.end_time as fecha_fin','medications.administer_route','people.name','people.last_name')
			->leftJoin('medical_orders', 'medications.medical_order_id', '=', 'medical_orders.id')
			->leftJoin('doctors', 'medical_orders.doctor_id', '=', 'doctors.id')
			->leftJoin('people', 'doctors.person_id', '=', 'people.id')
	        ->where('medications.id', '=', $json['medication_id'])
	        ->get();


		$aux = get_object_vars($medications[0]);

		$arrayName = explode(" ",$aux['name']);
		$name = trim($arrayName[0]);

		$arrayLastName = explode(" ",$aux['last_name']);
		$last_name = trim($arrayLastName[0]);

		$arrayFechaInicio = explode(" ",$aux['fecha_inicio']);
    	$fechaInicio = trim($arrayFechaInicio[0]);
    	$hora = $this->hora12(trim($arrayFechaInicio[1]));
		
		$arrayFechaFin = explode(" ",$aux['fecha_fin']);
    	$fechaFin = trim($arrayFechaFin[0]);

    	$arrayMedication = array(
    	    'fecha_inicio'  => $fechaInicio,
    	    'fecha_fin'  => $fechaFin,
    	    'hora'  => $hora,
    	    'name' => $name, 
    	    'last_name' => $last_name,
    	    'medicamento' => $aux['medicamento'],
    	    'frecuencia' => $aux['frecuencia'],
    	    'dosis' => $aux['dosis'],
    	    'administer_route' => $aux['administer_route'] 
    	   
    	);

    	$arrayMedicationReg=array();

		$MedicationsReg = DB::table('medication_nurse')
    			->select('medication_nurse.*','people.name','people.last_name')
    			->leftJoin('nurses', 'medication_nurse.nurse_id', '=', 'nurses.id')
    			->leftJoin('people', 'nurses.person_id', '=', 'people.id')
    	        ->where('medication_nurse.medication_id', '=', $json['medication_id'])
    	        ->get();

    	for ($i=0; $i <count($MedicationsReg) ; $i++) { 
			# code...
			$aux = get_object_vars($MedicationsReg[$i]);

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

	    	array_push($arrayMedicationReg,$inf);
		}

		$array = array("users" => $arrayUser, "medicationID" => $arrayMedication, "medicationReg" => $arrayMedicationReg);

		return $array;
	}


    public function setMedication(Request $request){
    	$json = $request->datos;    	

    	$fecha = date('Y-m-d');
    	$hora = date('H:i:s');

    	$datos = array(
    	    'created_at'   => date('Y-m-d H:i:s'),
    	    'updated_at'  => date('Y-m-d H:i:s'),
    	    'observation'  => $json['observation'],
    	    'nurse_id'  => $json['nurse_id'],
    	    'medication_id'  => $json['medication_id'],
    	    'status'  => $json['aplicado']
    	    
    	);

    	DB::table('medication_nurse')->insert($datos);  

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
