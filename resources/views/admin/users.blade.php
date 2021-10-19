@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>All users</h1>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Toggle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row"> {{ \App\Models\Enums\Roles::getKeys()[$user->role] }} </th>
                        <td> {{ $user->email }} </td>
                        <td> {{ \App\Models\Enums\Status::getKeys()[$user->status]  }} </td>

                        @if($user->role == \App\Models\Enums\Roles::reviewer)
                            @if($user->status == \App\Models\Enums\Status::unlocked)
                                <td>
                                    <form method="POST" action="/admin/{{ $user->id }}/lock">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-danger" name="lock">lock</button>
                                    </form>
                                </td>
                            @endif
                        @else
                            <td>
                                <button type="submit" class="btn btn-secondary" disabled="true" name="unlock">unable to lock admin</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
