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
}
