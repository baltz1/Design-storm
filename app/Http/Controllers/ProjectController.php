<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;


class ProjectController extends Controller
{
    public function index(){
      // Get all projects for the current user
      if(!Auth::user()){
        return back();
      }else{
        $projects = Project::where('user_id', Auth::id())->get();
        $active = Project::where('user_id',Auth::id())->where('active', 2)->first();
        $user = Auth::user();

        return view('account/projects/index', compact('projects', 'user', 'active'));
      }
  }

  public function create(){
    $user = Auth::user();
    return view('account/projects/create', compact('user'));
  }

  public function show($id){
    $project = Project::where('id',$id)->first();

    if(Auth::id() == $project->user_id){

      return view('account/projects/show', compact('project'));

    }else{
      return back();
    }
 }

 public function edit($id){
   $project = Project::where('id',$id)->first();

   if(Auth::id() == $project->user_id){
     return view('account/projects/edit', compact('project'));
   }else{
     return back();
   }

   return view('account/projects/edit', compact('project'));
}

public function store(request $request){
  $project = new Project;

  $project::create([
    "title" => $request->title,
    // relation with project and user
    "user_id" => Auth::id(),
    "active" =>$request->active
  ]);

  return redirect('account/projects');
}

public function destroy($id){
  $project = Project::where('id',$id)->first();
  // deletes project only if user is the owner if it
  if($project->user_id == Auth::id()){
    $project->deleteRelated();
    return redirect('account/projects');
  }else{
    return redirect('account/projects');
  }
}

public function update(request $request, $id){
// There can only be one active which is value 2
  if($request->active == 2) {
    Project::where('user_id', Auth::id())->where('active', 2)->update(["active" => 1]);
  }
  // updates project if user id is the same as current user
  Project::where('id',$id)->where('user_id', Auth::id())
  ->update([
    'title'=>$request->title,
    'active' =>$request->active,
  ]);
  return back();
}

}
