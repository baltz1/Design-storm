<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;

class AccountController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $projectCount = Project::where('user_id', Auth::id())->get();
    $project      = $projectCount;
    $inspirationCount = [];
    foreach ($project as $count) {
      array_push($inspirationCount, $count->inspirations);
    }
    
    $projectCount = sizeof($projectCount);
    return view('account/dashboard', compact('projectCount', 'project', 'inspirationCount'));
  }
}
