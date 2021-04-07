<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller {

    public function view() {
        return view('pages.login');
    }

    public function makeLogin(Request $request) {

        // get only email and password from request data
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        } else {
            return redirect('/login')->withErrors(['error' => 'Please enter valid email and password']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
