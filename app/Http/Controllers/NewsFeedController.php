<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Like;

class NewsFeedController extends Controller {

    function view(Request $request) {
        $limit = ($request->has('limit')) ? $request->limit : 10;
        // get all posts (with page limit and new post first)
        $posts = Post::orderByDesc('created_at')->paginate($limit);
        $posts->appends(['limit' => $limit]);
        // return $posts;
        return view('pages.newsfeed', [
            "posts" => $posts
        ]);
    }

    function view_post(Request $request, $handle) {
        // get post
        $post = Post::where('handle', $handle)->first();
        if (!$post) {
            abort(404);
        }

        return view('pages.newsfeed_post')->with([
                    'post' => $post,
                    'liked' => (Auth::check()) ? Like::where('user_id', Auth::user()->id)->where('post_id', $post->id)->count() : 0 // post linked or not by loggedin user
        ]);
        // return $handle;
    }

    function like(Request $request, $handle) {
        $post = Post::where('handle', $handle)->first();
        $user_id = Auth::user()->id;
        $like_count = Like::where('user_id', $user_id)->where('post_id', $post->id)->count();
        // check if post liked or not
        if ($like_count > 0) {
            return redirect('/newsfeed/' . $handle)->with('success', 'Already liked it');
        } else {
            // like post
            $post->likes()->save(Auth::user());
            return redirect('/newsfeed/' . $handle)->with('success', 'Liked');
        }
    }

    function dislike(Request $request, $handle) {
        $post = Post::where('handle', $handle)->first();
        $user_id = Auth::user()->id;
        // dislike post
        $like_count = Like::where('user_id', $user_id)->where('post_id', $post->id)->delete();
        return redirect('/newsfeed/' . $handle)->with('success', 'Disliked');
    }

}
