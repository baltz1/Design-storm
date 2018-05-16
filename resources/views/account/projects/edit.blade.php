@extends('layouts/account')

@section('title')
  Account - Dashboard
@endsection

@section('content')
  <div>
    <div class="row">
      <div class="col-md-10">
        <h1>Edit Projects</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">

          <div class="row">
            <div class="col-md-10">
              <form action="/account/projects/{{$project->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <label for="title">Title</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="title" value="{{$project->title}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="title">
                      Active
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <select name="active">
                      @if($project->active == 1){
                        <option value="1" selected>No</option>
                        <option value="2">Yes</option>
                      }@else{
                        <option value="2" selected>Yes</option>
                        <option value="1">No</option>
                      }
                      @endif
                    </select>
                  </div>
                </div>
                <div class="img-section">
                  <div class="row">
                    {{-- This gets all inspirations related to the project using the method inside th model --}}
                    @foreach($project->inspirations as $inspiration)
                    <div class="col-md-3">
                      <div class="box">
                        <div style="position: relative; background: url('{{$inspiration->image_url}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        </div>
                        <a class="delete-btn" href="/projects/inspiration/{{$inspiration->id}}/destroy">Remove</a>
                      </div>
                    </div>
                   @endforeach
                  </div>
                </div>
                <button type="submit">Save</button>
              </form>
            </div>
            <center>
              <div class="col-md-2">
                <a href="/account/projects/{{$project->id}}/delete" onclick="confirm" class="delete-btn">Delete Project</a>
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
