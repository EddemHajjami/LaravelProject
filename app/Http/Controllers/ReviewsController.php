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

    public function patch(Request $request, Review $review)
    {

        $this->validate($request, [
            'body' => 'required|min:10',
            'rating' => 'required|max:2',
        ]);

        $reviews = Review::all();
        $review->update($request->all());
        flash('Your review was successfully updated!, refresh page <a href="/account">here</a>')->success();
        return view('user.index', compact('reviews'));
    }

    public function remove($id)
    {
        $review = Review::find($id);
        $review->delete();

        flash('Review was successfully deleted!')->success();

        return back();
    }
}
