<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>
  <body>
    <header>
      <div class="container">
        <a class="logo" href="/">Design Storm</a>
        <nav>
          {{-- guest is a form of if statements and this is checking if user is online --}}
          @guest

            <a href="/register">register</a>
            <a href="/login">login</a>
          @else
            Active Project:
            @if($projects == "Empty")
              None
            @elseif($projects->active)
              <a href="/account/projects/{{$projects->id}}">{{$projects->title}}</a>
            @endif
            <a href="/account">{{$user->name}}</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          @endguest

        </nav>
      </div>
    </header>
    @yield('content')
  </body>
</html>
