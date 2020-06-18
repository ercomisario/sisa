<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(){
        $search = Input::get('q');
        $people = People::find($search);
        return View::make('person.search')->with();
    }
}
