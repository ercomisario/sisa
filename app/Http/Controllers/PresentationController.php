<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentation;
use Illuminate\Database\Eloquent\Builder;
class PresentationController extends Controller
{
    public $q;
    public function search(Request $request)
    {
        $this->q = $request->search;
        $presentation = Presentation::whereHas('component',function(Builder $query){
            
                return $query->where('name','LIKE','%'.$this->q.'%');
        })->get();
        foreach($presentation as $p){
            $component = $p->component()->first();
            $p->component = $component->name;
            $p->indication = $component->indication;
            $p->contraindication = $component->contraindication;
            $p->administerRoute = $p->administerRoute()->first()->name;
            $presentationType  = $p->presentationType()->first();
            $p->presentationType = $presentationType->name;
            $p->unit_measurement = $presentationType->unit_measurement;
        }
        
    return \response()->json($presentation);
    }
}
