<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //For query builder

class AjaxController extends Controller
{
    /*
    public function ajaxRequest(){
        return view('ajaxRequest');
    }
    */

    public function ajaxRequestPost(Request $request){
        //return dd($request->searchString);
        $searchResults = DB::table('user_details')
            ->select('user_details.firstname', 'user_details.lastname', 'user_details.nickname', 'user_details.status')
            ->where('user_details.firstname', 'LIKE', '%'.$request->searchString.'%')
            ->orwhere('user_details.lastname', 'LIKE', '%'.$request->searchString.'%')
            ->orwhere('user_details.nickname', 'LIKE', '%'.$request->searchString.'%')
            ->get();

            //return dd($searchResults);
            
            $htmlResult = "<table class='table'>";
            $htmlResult .= "<tr><th>Name</th><th>Division</th><th>Status</th><th>Action</th></tr>";
            
            
            foreach ($searchResults as $result){
                $htmlResult .= "<tr>";
                $htmlResult .= "<td>".$result->firstname." ".$result->lastname." (".$result->nickname.")</td>";
                $htmlResult .= "<td>"."division"."</td>";
                $htmlResult .= "<td>".$result->status."</td>";
                $htmlResult .= "</tr>";
            }
            
            $htmlResult .= "</table>";
            
        return $htmlResult;
        //return response()->json(['success'=>'Data is successfully added']);
        //Log::info($input);
        //return response();
    }

}
