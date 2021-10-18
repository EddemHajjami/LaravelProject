<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <title>{{ config('app.name', 'restaurantreview') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap/bootstrap.scss')}}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-default navbar-static-top site-navbar site-navbar-target" >
            <div class="container">
                <nav class="row align-items-center position-relative">
                        <div class="col-3">
                            <div class="site-logo">
                                <a class="navbar-brand"
                                   @guest
                                   href="{{ url('/') }}">
                                    @else
                                        href="{{ url('/restaurants') }}">
                                    @endguest

{{--                                        <img src="resources/images/logo.png" class="img-fluid">--}}
                                        <img class="site-logo" src="{{URL::asset('images/RestauRev.png')}}">
{{--                                        {{ config('app.name', 'restaurantCheck') }}--}}
                                </a>
                            </div>

                        </div>

                    <!-- Right Side Of Navbar -->

                    <nav class="nav navbar-nav navbar-right site-navigation text-right ml-auto d-none d-lg-block " id="navbarSupportedContent" role="navigation">

                        <form method="GET" action="/restaurants"  class="form-inline my-4 my-lg-0 nav-item" autocomplete="off" id="navbar-collapse" role="search">
                            {{ csrf_field() }}
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search">
                            <button class="btn restaurev-btn" type="submit">Search</button>
                        </form>
                        <ul class="site-menu main-menu js-clone-nav ml-auto nav-item " id="navbarNavDropdown">
                            <!-- Authentication Links -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @else

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/account">Hi, {{ Auth::user()->name }}</a>

                                    <div class="dropdown-menu restaurev-menu" aria-labelledby="navbarDropdownMenuLink">

                                        @if( Auth::user()->role == \App\Models\Enums\Roles::reviewer)
                                            <a class="dropdown-item" href="/account">Account</a>
                                        @else

                                            <a class="dropdown-item" href="/admin">Admin dashboard</a>
                                            <a href="/admin/users/" class="dropdown-item">Users</a>
                                            <a href="/admin/locked/" class="dropdown-item">
                                                Locked users <span class="badge badge-primary badge-pill">{{ Auth::user()->where('status', \App\Models\Enums\Status::locked)->count('status')}}</span>
                                            </a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </nav>
            </div>
        </nav>

        @yield('content')


    <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
