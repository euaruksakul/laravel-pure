<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail; 
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show($id){
        //$id = Auth::id();
        return view('user-details.show',[
            //'detail' => UserDetail::findOrFail($id)
            'detail' => UserDetail::where('user_id', $id)->firstOrFail() //Search column name = user_id
        ]);
    }

    public function edit($id){
        return view('user-details.edit',[
            'detail' => UserDetail::where('user_id', $id)->firstOrFail()
        ]);
    }

    public function store(Request $request){
        $id = Auth::user()->id;
        $detail = UserDetail::where('user_id', $id)->firstOrFail();
        //return dd($request);
        //return dd($detail);
        $detail->firstname = $request->firstname;
        $detail->lastname = $request->lastname;
        $detail->thai_firstname = $request->thai_firstname;
        $detail->thai_lastname = $request->thai_lastname;
        $detail->nickname = $request->nickname;
        $detail->phone_number = $request->phone_number;
        $detail->affiliation = $request->affiliation;
        $detail->address = $request->address;
        $detail->date_of_birth = $request->date_of_birth;
        $detail->blood_type = $request->blood_type;
        $detail->status = $request->status;

        $detail->save();

        return redirect()->route('user_details.show',[Auth::user()->id]);
    }
}
