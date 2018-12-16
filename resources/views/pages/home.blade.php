@extends('layouts/main')

@section('title')
  DesignStorm - Inspiration for developers
@endsection



@section('content')
  <div id="site-section">
    <div class="container">
      <div id="home">
        <div class="search-area">
          <div class="search-container">
            <form class="" action="/results" method="post">
              @csrf
              <h1>DesignStorm</h1>
              <input class="search" type="text" placeholder="Search" name="search">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
