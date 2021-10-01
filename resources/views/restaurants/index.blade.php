@extends('layouts.app')

@section('content')
<div class="container">


    <div class="col-md-12">
        <div class="welcome">
            <div class="alert alert-info" role="alert">

                @if(Auth::user()->role == 0)
                    <h4 class="alert-heading">Hi, {{ Auth::user()->name }}!</h4>
                    <hr>
                    <p>The control panel is now available!</p>
                @else
                    <h4 class="alert-heading">Hi, {{ Auth::user()->name }}!</h4>
                    <hr>
                    <p>Browse trough the collection of restaurants and write a review!</p>
                @endif
            </div>
        </div>
    </div>

    <div class="row-fluid content col-md-12">



        <form method="GET" action="/restaurants" class="search" autocomplete="off" id="navbar-collapse" role="search">
            {{ csrf_field() }}
            <div class="form-group col-md-5 input-group">
                <span class="input-group-btn search_btn">
                    <button class="btn btn-info" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </span>
            </div>
        </form>

        <!-- foreach loop door db -->

        <div id="result">
            @foreach ($restaurants as $restaurant)


            <div class="col-md-3 restaurant">
                <div class="card">
                    <img class="card-img-top" src="{{ $restaurant->image }}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{ $restaurant->path() }}"><h5 class="card-title">{{ $restaurant->name }}</h5></a>

                        <p class="card-text">Locatie: {{$restaurant->location}}</p>
                    </div>
                </div>
            </div>


            @endforeach

        </div>

    </div>

</div>
@endsection
