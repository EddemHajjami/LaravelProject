<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;

class UsersController extends Controller
{
    public function admin() {
        return view('admin.index');
    }

    public function index()
    {
    	$users = User::all()->where('status', 1);
        $userscount = User::where('status', 0)->count('status');
    	$restaurants = restaurant::all();
        return view('admin.index', compact('users', 'userscount', 'restaurants'));
    }

    public function user()
    {
    	$reviews = Review::all();
    	return view('user.index', compact('reviews'));
    }

    public function remove(Request $request, $id) {

        $user = User::findOrFail($id);
        $user->delete();

        flash('User was successfully deleted!')->success();

        return back();
    }

}
