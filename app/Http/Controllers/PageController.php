<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Project;


class PageController extends Controller
{
    public function index(){
      $user     = Auth::user();
      $projects = Project::where('user_id',Auth::id())->where('active', 2)->first();
      if($projects == null){
        $projects = "Empty";
      }

      return view('pages/home', compact('user', 'projects'));
    }



    public function results(request $request){

      $search = $request->search;
      $projects = Project::where('user_id',Auth::id())->where('active', 2)->first();
      if($projects == null){
        // return redirect('/account/projects');
        return redirect('search/'.urlencode($search));
      }else{
        return redirect('search/'.urlencode($search));
      }
    }



    public function search(request $request, $keyword){


      $client = new Client();
      // original api call is https://api.behance.net/v2/projects?q=car&client_id=DZY8r8MeIK2zBH6QmSzsmTSK54RldTr0
      $res = $client->request('GET', "https://api.behance.net/v2/projects?q=".urlencode($keyword)."&client_id=".env("BEHANCE_KEY")."&field=".urlencode("Web Design"));

      $data = $res->getBody();
      // pretty much decodes the data that comes in into a object
      $data = json_decode($data);
      $filteredData = $data->projects;
      $user = Auth::user();
      $arrayInfo = [];
      if($user){
        $inspirationsArray = Project::where('user_id', Auth::id())->where('active', 2)->first();
        $inspirationsArray = $inspirationsArray->inspirations;
      foreach($inspirationsArray as $image) {
        array_push($arrayInfo, $image->image_info) ;
      }
      }



        // return $inspirationArray;
        $projects = Project::where('user_id',Auth::id())->where('active', 2)->first();
        if($projects == null){
          $projects = "Empty";
        }

        return view('pages/results', compact('user', 'filteredData', 'keyword', 'arrayInfo', 'projects'));

      }
  }
