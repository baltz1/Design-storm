<?php

namespace App\Http\Controllers;

use App\Inspiration;
use Illuminate\Http\Request;
use Auth;
use App\Project;

class InspirationController extends Controller
{
  public function create(request $request, $image_info){
    $projectId = Project::where('user_id',Auth::id())->where('active', 2)->first();
    $savedData = [
      "image_info"=> $image_info,
      "image_url" => $request->image_url,
      "project_id" => $projectId->id
    ];

    $inspiration = Inspiration::create($savedData);
    return back();
 }

 public function destroy($id){
   $inspiration = Inspiration::where('id', $id);
   $inspiration->delete();
   return back();
 }
}
