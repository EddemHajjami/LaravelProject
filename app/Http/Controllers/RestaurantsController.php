<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Request;

class RestaurantsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $search = Request::get('search');

        $restaurants = restaurant::where('name','like','%'.$search.'%')
            ->orderBy('name')
            ->paginate(20);


        return view('restaurants.index', compact('restaurants'));
    }

    public function show(restaurant $restaurant, User $users, Review $reviews)
    {
        return view('restaurants.show', compact('restaurant', 'users', 'reviews'));
    }

    public function add(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'location' => 'required|max:10',
            'foodType' => 'required',
            'image' => 'required|max:25'
        ]);

        $restaurant = new restaurant;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->location = $request->location;
        $restaurant->foodType = $request->foodType;
        $restaurant->image = $request->image;

        $restaurant->save();

        flash('restaurant was successfully added!')->success();

        return back();
    }
}
