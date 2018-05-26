@extends('layouts/account')

@section('title')
  Account - Dashboard
@endsection

@section('content')
  <div>
    <div class="row">
      <div class="col-md-10">
        <h1>{{$project->title}}</h1>
        <h6>Here is your current inspiration -<strong style="color:green;"> {{$project->user->name}}</strong></h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">

          <div class="row">
            <div class="col-md-10">
                <div class="img-section">
                  <div class="row">
                    @foreach($project->inspirations as $inspiration)
                    <div class="col-md-3">
                      <div class="box">
                        <div style="position: relative; background: url('{{$inspiration->image_url}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
            <center>
              <div class="col-md-2">
                <a href="/account/projects/{{$project->id}}/edit" class="update-btn">Edit</a>
                <a href="/account/projects/{{$project->id}}/delete" onclick="confirm()" class="delete-btn">Delete</a>
              </div>
          </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
  <script>

  </script>
@endsection
