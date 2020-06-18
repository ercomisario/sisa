<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Municipality;
use App\City;
use App\Parish;
use App\Sector;

class LocationController extends Controller
{
	public function allSelect(Request $request){
		$query = State::all();
	}
    public function stateSelect(Request $request){
    	$query = State::all();
  		echo "State ".$query->first()->name;
  		echo $query->first()->id;
    }

    public function municipalitySelect(Request $request){
    	$query = Municipality::where('state_id',1)->get();
    	echo "Municipality ".$query->first()->name;
    	echo $query->first()->id;
    }

    public function citySelect(Request $request){
    	$query = City::where('municipality_id',1)->get();
    	echo "Ciudad ".$query->first()->name;
    	echo $query->first()->id;
    }
    public function parishSelect(Request $request){
    	$query = Parish::where('city_id',1)->get();
    	echo "Parroquia ".$query->first()->name;
    	echo $query->first()->id;
    }

    public function sectorSelect(Request $request){
    	$query = Sector::where('parish_id',1)->get();
    	echo "Sector ".$query->first()->name;
    	echo $query->first()->id;
    }

}