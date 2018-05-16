@extends('layouts/account')

@section('title')
  Account - Dashboard
@endsection

@section('content')
  <div>
    <h1>Create Projects</h1>
    <h6>Lets get started -<strong style="color:green;">{{$user->name}}</strong></h6>
    <div class="row">
      <div class="col-md-12">
        <div class="box">

          <div class="row">
            <div class="col-md-10">
              <form action="/account/projects" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <label for="title">Title</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="title">
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
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                </div>
                <button type="submit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
  <script>

  </script>
@endsection
