<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //For query builder
use App\Models\ProjectMember;

class AjaxController extends Controller{

    public function ajaxRequestRemoveMember(Request $request){
        $member=ProjectMember::
                where([
                    ['project_id', '=', $request->project_id],
                    ['member_id', '=', $request->member_id]
                ]);
        $member->delete();
        $projectMembers = DB::table('project_members')
            ->join('user_details', 'project_members.member_id', '=', 'user_details.user_id')
            ->select('project_members.member_id', 'user_details.firstname', 'user_details.lastname')
            ->where('project_members.project_id', '=', $request->project_id)
            ->get();
        
        $htmlResult = "<table class='table'>";
        $htmlResult .= "<tr><th>First name</th><th>Last name</th><th>Action</th></tr>";
        foreach($projectMembers as $projectMember){
            $htmlResult .= "<tr>";
            $htmlResult .= "<td>".$projectMember->firstname."</td>";
            $htmlResult .= "<td>".$projectMember->lastname."</td>";
            $htmlResult .= "<td>
                    <button
                    type='button'
                    id='button_".$projectMember->member_id."'
                    class='button_removeProjectMember btn btn-info btn-sm'
                    data-value1='".$request->project_id."'
                    data-value2='".$projectMember->member_id."'
                    onclick='RemoveMember(this.getAttribute(`data-value1`),this.getAttribute(`data-value2`));'
                    >remove
                </button>
            </td>";
            $htmlResult .= "</tr>";
        }
        $htmlResult .="</table>";
        return $htmlResult;
    }

    public function ajaxRequestAddMember(Request $request){
        
        $newMembership = new ProjectMember();
        $newMembership->project_id = $request->project_id;
        $newMembership->member_id = $request->member_id;

        $newMembership->save();

        $projectMembers = DB::table('project_members')
            ->join('user_details', 'project_members.member_id', '=', 'user_details.user_id')
            ->select('project_members.member_id', 'user_details.firstname', 'user_details.lastname')
            ->where('project_members.project_id', '=', $request->project_id)
            ->get();
        
        $htmlResult = "<table class='table'>";
        $htmlResult .= "<tr><th>First name</th><th>Last name</th><th>Action</th></tr>";
        foreach($projectMembers as $projectMember){
            $htmlResult .= "<tr>";
            $htmlResult .= "<td>".$projectMember->firstname."</td>";
            $htmlResult .= "<td>".$projectMember->lastname."</td>";
            $htmlResult .= "<td>
                    <button
                    type='button'
                    id='button_".$projectMember->member_id."'
                    class='button_removeProjectMember btn btn-info btn-sm'
                    data-value1='".$request->project_id."'
                    data-value2='".$projectMember->member_id."'
                    onclick='RemoveMember(this.getAttribute(`data-value1`),this.getAttribute(`data-value2`));'
                    >remove
                </button>
            </td>";
            $htmlResult .= "</tr>";
        }
        $htmlResult .="</table>";
        return $htmlResult;
    }

    public function ajaxRequestSearch(Request $request){

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
           
            $htmlResult = "<h4>Search results:</h4><table class='table'>";
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
    }

}
