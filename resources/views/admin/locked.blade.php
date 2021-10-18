@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <h1>Locked accounts</h1>
    </div>

    <div class="row">
        @include('flash::message')

        <div class="col-md-12 admin_page">
            @if (!$users->count())
                <div class="alert alert-info hidden_alert" role="alert">Locked accounts not found!</div>
            @else
                @foreach($users as $user)
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$user->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $user->email }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{$user->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body clearfix">
                                    <h5 class="card-title">E-mail: {{ $user->email }}</h5>
                                    <p class="card-text">Role: {{ \App\Models\Enums\Roles::getKeys()[$user->role] }}</p>
                                    <p class="card-text">Status: {{ \App\Models\Enums\Status::getKeys()[$user->status] }}</p>

                                    <form method="POST" action="/admin/{{ $user->id }}/unlock">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-info" name="unlock">unlock</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

@endsection
