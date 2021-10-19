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

    	flash('Review added successfully')->success();

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
        flash('Review updated successfully, refresh page <a href="/account">here</a> to see result')->success();
        return view('user.index', compact('reviews'));
    }

    public function remove($id)
    {
        $review = Review::find($id);
        $review->delete();

        flash('Review deleted successfully')->success();

        return back();
    }
}
