<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class RegisterController extends Controller {

    public function view() {
        return view('register');
    }

    public function save(Request $request) {
        return $request->all();
        return Hash::make($request->password);
        
    }

}
