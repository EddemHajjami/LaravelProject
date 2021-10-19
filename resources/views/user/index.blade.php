@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Your reviews</h1>
    </div>
    <div class="row">
        @include('flash::message')
        <div class="col-md-12">
            <p>
                @foreach($reviews as $review)
                    @if(Auth::user()->id == $review->user_id)
                        <button class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample{{ $review->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{ $review->id }}" style="margin-bottom: 10px;">
                            {{$review->name}}, Rating: {{$review->rating}}
                        </button>
                    @endif
                @endforeach
            </p>
            @if (!$reviews->count())
                <div class="alert alert-info hidden_alert" role="alert">There were no reviews!</div>
            @else
                @foreach($reviews as $review)
                    @if(Auth::user()->id == $review->user_id)
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample{{ $review->id }}">
                                <div class="card card-body clearfix">
                                    <h5 class="lead">Restaurant: {{ $review->name }}</h5>
                                    <h7 class="pull-right">{{ $review->created_at }}</h7></br>
                                    <h7>Review: {{ $review->body }}</h7></br>
                                    <h7>Rating: {{ $review->rating }}</h7></br>

                                    <a href="/account/{{$review->id}}/edit" class="btn btn-info pull-right">
                                        review wijzigen
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
