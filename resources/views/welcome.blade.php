@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-12">
        <div class="welcome">
            @guest
                <div class="jumbotron">
                    <h1 class="display-4">Please login to review</h1>
                </div>
            @endguest
        </div>
    </div>

    <div class="row-fluid content col-md-12">

    @foreach ($restaurants as $restaurant)

            <div class="col-md-3 restaurant">
                <div class="card">
                    <img class="card-img-top" src="{{ $restaurant->image }}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{ $restaurant->path() }}"><h5 class="card-title">{{ $restaurant->name }}</h5></a>

                        <p class="card-text">Location: {{$restaurant->location}}</p>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>

@endsection
