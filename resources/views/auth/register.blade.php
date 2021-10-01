@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-md-12" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="col-md-6 col-md-offset-3 login">

            <div class="panel">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-1">

                                <input id="name" placeholder="Username" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" placeholder="E-Mail Adress" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-1">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-1">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-info">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
