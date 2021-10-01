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
            @include('flash::message')

            <div class="panel">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" placeholder="E-Mail Adress" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1 login-btn">
                                <button type="submit" class="btn btn-info">
                                    Login
                                </button>
                            </div>
                            <div class="col-md-10 col-md-offset-1 lost">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lost your password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
