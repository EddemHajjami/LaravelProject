<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::inRandomOrder()->get()->take(4);
        return view('welcome', compact('restaurants'));
    }
}
