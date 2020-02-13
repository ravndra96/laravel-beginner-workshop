<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPostController extends Controller
{
    function view(Request $request){
        return view('pages.my_posts');
    }
    
    function create_post(Request $request){
        return view('pages.create_post');
    }
    //
}
