<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //For query builder
use App\Models\ProjectMember;

class AjaxController extends Controller
{
    /*
    public function ajaxRequest(){
        return view('ajaxRequest');
    }
    */
    public function ajaxRequestAddMember(Request $request){
        
        $newMembership = new ProjectMember();
        $newMembership->project_id = $request->project_id;
        $newMembership->member_id = $request->member_id;

        $newMembership->save();
    }

    public function ajaxRequestPost(Request $request){
        //return dd($request->searchString);
        //return dd($request->project_id);

        
        $test=DB::table('project_members')
        ->select('member_id')
        ->where('project_id', '=', $request->project_id)
        ->get()
        ->pluck('member_id');
        //->toarray();
        
        //return dd($test);
        //$test=array_values($test);
        //$test2=[1,11];
        //return dd($test);

        /*
        $rawQuery='SELECT `firstname` FROM `user_details` 
        WHERE (`firstname` LIKE "%'.$request->searchString.'%" AND
         `user_id` NOT IN (SELECT `member_id` FROM `project_members` WHERE `project_members`.`project_id` = '.$request->project_id.'))';
         $searchResults = DB::raw(rawQuery);
        */

        $searchResults = DB::table('user_details')
            ->select('user_details.user_id', 'user_details.firstname', 'user_details.lastname', 'user_details.nickname', 'user_details.status')             
            ->whereNotIn('user_details.user_id', DB::table('project_members')
                ->select('member_id')
                ->where('project_id', '=', $request->project_id)
                ->get()
                ->pluck('member_id')
            )
            ->where(function ($query) use ($request) {
                $query->where('user_details.firstname', 'LIKE', '%'.$request->searchString.'%')
                ->orWhere('user_details.lastname', 'LIKE', '%'.$request->searchString.'%')
                ->orWhere('user_details.nickname', 'LIKE', '%'.$request->searchString.'%');
            })
            ->get();
           
            $htmlResult = "<table class='table'>";
            $htmlResult .= "<tr><th>Name</th><th>Division</th><th>Status</th><th>Action</th></tr>";
            
            foreach ($searchResults as $result){
                $htmlResult .= "<tr>";
                $htmlResult .= "<td>".$result->firstname." ".$result->lastname." (".$result->nickname.")</td>";
                $htmlResult .= "<td>"."division"."</td>";
                $htmlResult .= "<td>".$result->status."</td>";
                $htmlResult .= "<td>
                    <button
                        type='button'
                        id='button_".$result->user_id."'
                        class='button_addProjectMember btn btn-info btn-sm'
                        value='".$result->user_id."'
                        onclick='AddMember(this.value);'
                        >add
                    </button>
                </td>";
                $htmlResult .= "</tr>";
            }
            
            $htmlResult .= "</table>";
            
        return $htmlResult;
        //return response()->json(['success'=>'Data is successfully added']);
        //Log::info($input);
        //return response();
    }

}
