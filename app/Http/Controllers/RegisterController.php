<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Validator;
use App\User;
use Auth;

class RegisterController extends Controller {

    public function view() {
        return view('pages.register');
    }

    public function save(Request $request) {

        // return $request->all();  // to print all request data
        $data = $request->all();
        // validation rules
        $rules = [
            "name" => 'required|max:255',
            "email" => 'required|email|unique:App\User,email',
            'password' => 'required|min:3|max:10'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('/register')
                            ->withErrors($validator)
                            ->withInput();
        }
        // create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // login current user
        Auth::login($user);
        return redirect('/');
    }

}
