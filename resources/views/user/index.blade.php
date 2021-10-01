@extends('layouts.app')

@section('content')
<div class="container">



    @include('flash::message')

    <div class="col-md-12">

    	<table class="table table_users">
		  <thead class="thead-inverse">
		    <tr class="table-info">
		      <th>#</th>
		      <th>User:</th>
		      <th>Review:</th>
		      <th>Rating:</th>
		      <th>Date:</th>
		      <th>Edit:</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($reviews as $review)
		  	@if(Auth::user()->name == $review->user->name)
			    <tr>
			      <td> {{ $review->id }} </td>

			      <td> {{ $review->user->name }} </td>
			      <td> {{ $review->body }} </td>
			      <td> {{ $review->rating }} </td>
			      <td> {{ $review->created_at }} </td>

			      </td>

			    </tr>
			@endif
		    @endforeach
		  </tbody>
		</table>
    </div>



</div>
@endsection
