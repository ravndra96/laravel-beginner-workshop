<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class MyLikeController extends Controller {

    function view(Request $request) {
        // get likes (by whom and on which post)
        $likes = Like::with(['user', 'post'])->where('user_id', Auth::user()->id)->orderByDesc('created_at')->get();
        return view('pages.my_likes', [
            "likes" => $likes
        ]);
    }

}
