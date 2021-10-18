<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function admin() {
        return view('admin.index');
    }

    public function index()
    {
    	$restaurants = restaurant::all();
        $allUsers = User::where('status', 0)->count('status');
        return view('admin.index', compact('restaurants', 'allUsers'));
    }

    public function users()
    {
        $users = User::all()->where('status', 1);
    	return view('admin.users', compact('users'));
    }

    public function user()
    {
        $reviews = DB::table('reviews')
            ->join('restaurants', 'reviews.restaurant_id', '=', 'restaurants.id')->get();
    	return view('user.index', compact('reviews'));
    }

    public function remove($id) {

        $user = User::findOrFail($id);
        $user->delete();

        flash('User was deleted!')->success();

        return back();
    }

    public function unlock($id) {

        $user = User::findOrFail($id);
        $user->status = 1;
        $user->update();

        flash('Unlocked '. $user->name)->success();
        return back();
    }

    public function lock($id) {

        $user = User::findOrFail($id);
        $user->status = 0;
        $user->update();

        flash('Locked '. $user->name)->success();
        return back();
    }

    public function lockedUsers() {
        $users = User::all()->where('status', 0);
        return view('admin.locked', compact('users'));
    }

}
