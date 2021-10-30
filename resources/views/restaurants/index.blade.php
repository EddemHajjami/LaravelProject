@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Please review a restaurant!</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row-fluid content col-md-12">
            @foreach ($restaurants as $restaurant)
                <div class="col-md-3 restaurant">
                    <div class="card">
                        <img class="card-img-top" src="{{ $restaurant->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <p class="card-text">Location: {{$restaurant->location}}</p>
                            <div class="col text-right">
                                <a href="{{ $restaurant->path() }}">
                                    <button type="submit" class="btn btn-info">review</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
