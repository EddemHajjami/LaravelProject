<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function add(Request $request, restaurant $restaurant) {

    	$this->validate($request, [
    		'body' => 'required|min:10',
    		'rating' => 'required|max:2'
    	]);

    	$review = new Review;
    	$review->by(Auth::User());
    	$review->body = $request->body;
    	$review->rating = $request->rating;

    	$restaurant->reviews()->save($review);

    	flash('Your review was successfully added!')->success();

    	return back();
    }

    public function edit(Review $review)
    {

        return view('user.edit', compact('review'));
    }
}
