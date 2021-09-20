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
        $userId = Auth::id();
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
        return view('instruments.show',[
            'instrumentDetail' => $instrumentDetail,
            'userId' => $userId
            ]);
    }

    public function edit($id){

        return view('instruments.edit',[
            'instrumentDetail' => Instrument::findOrFail($id)   
        ]);
    }

    public function update($id, Request $request){
        //Upload and process (resize) the image
        $imageFile = $request -> file('imagefile');
        //return dd($imageFile);
        $imageExtension = strtolower($imageFile->getClientOriginalExtension());
        $newName = hexdec(uniqid()).'.'.$imageExtension;
        
        //Create GD image for php
        if ($imageExtension == 'jpeg') {
            $image = imagecreatefromjpeg($imageFile);
        } elseif ($imageExtension == 'gif') {
            $image = imagecreatefromgif($imageFile);
        } elseif ($imageExtension == 'png') {
            $image = imagecreatefrompng($imageFile);
        }

        //Scale the image down for 'small' image folder
        $smallImage=imagescale($image,240,-1);
        $quality = 95;

        //Save the image file (in the public folder)
        imagejpeg($smallImage, 'img/small/instruments/'.$newName, $quality);
        imagejpeg($image, 'img/instruments/'.$newName, $quality);

        //Record new image_path in instrument DB
        $projectDetail = Instrument::findOrFail($id);
        $projectDetail->image_path='instruments/'.$newName;
        $projectDetail->save();

        return redirect()->route('instruments.show',['id' => $id]);
    }
    //
}
