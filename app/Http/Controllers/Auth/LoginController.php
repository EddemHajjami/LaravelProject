<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/restaurants';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        $credentials = $request->only('email', 'password');

        return $request->only('email', 'password') + ['status' => 1];
    }

    protected function loginValidation($request)
    {
        $rules = array(
          'email'      => 'required|email|max:255|unique:users',
          'password'   => 'required|min:6|confirmed',
    );
        $this->validate( $request , $rules);
    }


    protected function getLoginCredentials(Request $request)
    {
        $validator = $this->loginValidation($request);
        if($validator->passes())
        {
         return[
          'email'    => Request::input('email'),
          'password' => Request::input('password')
        ];
        return true;

        } else {
          return redirect()->back()->withErrors();
       }
    }
}
