<?php

namespace App\Http\Controllers;

use App\Models\Enums\Status;
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
        return view('admin.index', compact('restaurants'));
    }

    public function users(Request $request)
    {
        if ($request->exists('filter')){
            $users = User::all()->where('status', Status::unlocked)
                ->where('role', $request->get('filter'));
        }
        else
        {
            $users = User::all()->where('status', Status::unlocked);
        }

    	return view('admin.users', compact('users'));
    }

    public function user()
    {
        $reviews = Review::with('restaurant')->get();

    	return view('user.index', compact('reviews'));
    }

    public function unlock($id) {

        $user = User::findOrFail($id);
        $user->status = Status::unlocked;
        $user->update();

        flash('Successfully unlocked '. $user->name)->success();
        return back();
    }

    public function lock($id) {

        $user = User::findOrFail($id);
        $user->status = Status::locked;
        $user->update();

        flash('Successfully locked '. $user->name)->success();
        return back();
    }

    public function lockedUsers() {
        $users = User::all()->where('status', Status::locked);
        return view('admin.locked', compact('users'));
    }

}
