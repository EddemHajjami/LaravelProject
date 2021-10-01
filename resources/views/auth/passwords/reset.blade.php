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
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
 
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-10 col-md-offset-1">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-info">
                                    Reset Password
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
