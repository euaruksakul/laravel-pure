<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //For query builder 

class InstrumentController extends Controller
{
    public function index(){
        //$userId = Auth::id();
        $instruments = Instrument::select('id','name','image_path')->get();
        //return dd($projectList);
        return view('instruments.index',[
            'instruments' => $instruments
        ]);
    }
    //
}
