<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = $request->get('query');

        $restaurants = Restaurant::where('name', 'LIKE', "%" . $query . "%")
            ->orWhere('location', 'LIKE', "%" . $query . "%")
            ->orderBy('name')
            ->paginate(15);

        print_r($request->get('search'));

        return view('restaurants.index', compact('restaurants'));
    }

    public function show(restaurant $restaurant, User $users, Review $reviews)
    {
        return view('restaurants.show', compact('restaurant', 'users', 'reviews'));
    }

    public function add(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'location' => 'required|max:15',
            'foodType' => 'required',
            'image' => 'required|max:250'
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

    public function remove($id) {

        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        flash('restaurant was successfully deleted!')->success();


        return back();
    }
}
