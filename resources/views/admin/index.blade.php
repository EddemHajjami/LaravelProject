@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Control panel</h1>
    </div>

    <div class="row">
        <div class="col text-right">
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#addRestaurantModal">
                ADD RESTAURANT
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 end">
            @foreach($restaurants as $restaurant)
                <div class="col-sm-3 d-flex align-items-stretch">
                    <div class="card">
                        <img class="card-img-top" src="{{ $restaurant->image }}" alt="Card image cap">
                        <div class="card-body">
                            <a href="{{ $restaurant->path() }}"><h5 class="card-title">{{ $restaurant->name }}</h5></a>

                            <p class="card-subtitle mb-2 text-muted">Locatie: {{$restaurant->location}}</p>
                            <p class="card-text">Food type: {{$restaurant->foodType}}</p>

                            <form method="POST" action="/admin/{{ $restaurant->id }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade in" tabindex="-1" id="addRestaurantModal" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Voeg een restaurant toe</h5>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger col-md-3" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin">
                        {{ csrf_field() }}
                        Name: <input type="text" name="name" class="form-control" placeholder="Restaurant, like Loetje...">
                        Description: <textarea name="description" class="form-control" placeholder="Description, like what about this typical restaurant...">{{old('body')}}</textarea>
                        Location: <input type="text" name="location" class="form-control" placeholder="Location, like Rotterdam...">
                        Food type: <input type="text" name="foodType" class="form-control" placeholder="Food type, like vegan...">
                        Image url: <input type="text" name="image" class="form-control" placeholder="Url of image of the restaurant...">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
