@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <h1>Edit review</h1>
    </div>

    <div class="row">
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-md-12" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
    </div>

    <div class="row">
        <div class="col-md-12 edit">

            <form method="POST" action="/account/{{$review->id}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group col-md-6 review_field">
                    <textarea name="body" class="form-control">{{ $review->body }}</textarea>
                </div>

                <div class="form-group rating col-md-2">
                    <input type="number" name="rating" class="form-control rate" min="0" max="10" value="{{ $review->rating }}">
                </div>
                <div class="form-group col-md-12">
                    <a href="/account" class="btn btn-info">Back</a>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
