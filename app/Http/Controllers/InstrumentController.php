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

    public function show($id){
        $instrumentDetail = DB::table('instruments')
                                ->join('users','instruments.manager_id','=','users.id')
                                ->join('user_details','instruments.manager_id','=','user_details.user_id')
                                ->select('instruments.id as id',
                                        'instruments.name as name',
                                        'instruments.thainame as thainame',
                                        'instruments.description as description',
                                        'instruments.image_path as image_path',
                                        'user_details.firstname as manager_firstname',
                                        'user_details.lastname as manager_lastname',
                                        'users.email as manager_email'
                                        )
                                ->where('instruments.id', '=', $id)
                                ->first(); //Get only 1 row (can use $instrumentDetail -> xxx)
                                //->get(); //Get many rows (have to use $instrumentDetail[0] -> xxx)
        //$instrumentDetail = Instrument::findOrFail($id);
        //return dd($instrumentDetail);
        return view('instruments.show',[
        //'instrumentDetail' => Instrument::findOrFail($id)   
            'instrumentDetail' => $instrumentDetail
            ]);
    }
    //
}
