<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //For query builder

class ProjectController extends Controller
{
    public function create(Request $request){
        return view('projects.create');
    }

    public function store(Request $request){
        $id = Auth::id();
        $projectDetail = new Project(); //Use the Project model
        $projectDetail->name = $request->name;
        $projectDetail->type = $request->type;
        $projectDetail->description = $request->description;
        $projectDetail->manager_id = $id;
        $projectDetail->start_date = $request->start_date;
        $projectDetail->end_date = $request->end_date;

        $projectDetail->save();

        return redirect('dashboard');
    }

    public function update($id, Request $request){
        //$id = Auth::id();
        //return dd($id);
        $projectDetail = Project::findOrFail($id); //project id??
        $projectDetail->name = $request->name;
        $projectDetail->type = $request->type;
        $projectDetail->description = $request->description;
        //$projectDetail->manager_id = $id;
        $projectDetail->start_date = $request->start_date;
        $projectDetail->end_date = $request->end_date;

        $projectDetail->save();

        //return redirect('dashboard');
        return redirect()->route('projects.show',['id' => $id]);
    }

    public function index(){
        $userId = Auth::id();
        $projectList = Project::where('manager_id', $userId)->get();
        //return dd($projectList);
        return view('projects.index',[
            'projectList' => $projectList
        ]);
    }

    public function show($id){
        //PROJECT MEMBERs
        $projectMembers = DB::table('project_members')
            ->join('user_details', 'project_members.member_id', '=', 'user_details.user_id')
            ->select('project_members.member_id', 'user_details.firstname', 'user_details.lastname')
            ->where('project_members.project_id', '=', $id)
            ->get();
        //return dd($projectMembers);

        return view('projects.show',[
            'projectDetail' => Project::findOrFail($id),
            'projectMembers' => $projectMembers
        ]);
    }

    public function edit($id){
        return view('projects.edit',[
            'projectDetail' => Project::findOrFail($id)
        ]);
    }
    //
}
