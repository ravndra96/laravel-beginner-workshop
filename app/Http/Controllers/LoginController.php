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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/dashboard');
        } else {
            return redirect('/login')->withErrors(['error' => 'Please enter valid email and password']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
