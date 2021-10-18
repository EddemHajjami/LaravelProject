@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row content col-md-12">

        @include('flash::message')

        <div class="col-md-5 restaurant">
            <div class="card">
                <img class="card-img-top" src="{{ $restaurant->image }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ $restaurant->path() }}"><h5 class="card-title">{{ $restaurant->name }}</h5></a>

                    <br>
                        <span> Location: {{ $restaurant->location }} </span></br>
                        <span> Food type: {{ $restaurant->foodType }} </span>

                    </p>
                    <p> {{ $restaurant->description }} </p>
                    <a class="btn btn-info" href="/restaurants/">back to restaurants</a>
                </div>
            </div>
        </div>

        <div class="col-md-7 reviews">
            <h2>Reviews</h2>

            @if (!$reviews->count())
                <div class="alert alert-info hidden_alert" role="alert">There were no reviews!</div>
            @else

                @foreach($restaurant->reviews as $review)

                    <div class="alert alert-info clearfix" role="alert">
                        <div class="alert-heading">
                            <p class="font-weight-bold pull-left">{{ $review->user->name }}</p>
                            <p class="text-right">{{ $review->created_at }}</p>
                        </div>
                        <hr>
                        <p class="font-weight-normal pull-left mb-0">{{ $review->body }}</p>
                        <p class="font-weight-bold pull-right mb-0"> Rating: {{ $review->rating }}</p>
                    </div>
                @endforeach
            @endif

            @if (count($errors))
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger col-md-12" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <form method="POST" action="/restaurants/{{ $restaurant->id }}">
                {{ csrf_field() }}
                <div class="form-group col-md-9">
                    <h4>Add a review:</h4>
                    <textarea name="body" class="form-control" placeholder="This is an awesome restaurant">{{old('description')}}</textarea>
                </div>

                <div class="form-group rating col-md-2">
                    <h4> Number:</h4>
                    <input type="number" name="rating" class="form-control rate" min="0" max="10" placeholder="7" value="{{old('rating')}}">
                </div>
                <div class="form-group col-md-12 add_btn">
                    <button type="submit" class="btn btn-info">Add</button>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection
