<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Post;
use Auth;
use Str;
use Illuminate\Validation\Rule;

class MyPostController extends Controller {

    function view(Request $request) {
        return view('pages.my_posts');
    }

    function create_post(Request $request) {
        return view('pages.create_post');
    }

    function edit_view_post(Request $request, $id) {
        $post = Post::where('user_id', Auth::user()->id)->where('id', $id)->first();
        return view('pages.edit_post')->with([
                    'post' => $post
        ]);
    }

    function save_post(Request $request) {
        $data = $request->all();
        $rules = [
            "title" => 'required|max:255',
            "content" => 'required|min:1',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('/create_post')
                            ->withErrors($validator)
                            ->withInput();
        }
        $post = new Post();
        $post->title = $request->title;
        $post->handle = Str::slug($request->title, '-');
        $post->content = $request->content;
        Auth::user()->posts()->save($post);
        return redirect('/my_posts')->with('success', 'Your post has been published successfully');
    }

    function edit_post(Request $request, $id) {
        $data = $request->all();
        $rules = [
            "title" => [
                'required',
                'max:255',
                Rule::unique('posts')->ignore($id)
            ],
            "content" => 'required|min:1',
        ];
        $message = [
            "title.unique" => "Please enter other title"
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->fails()) {
            return redirect('/edit_post/' . $id)
                            ->withErrors($validator)
                            ->withInput();
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->handle = Str::slug($request->title, '-');
        ;
        $post->content = $request->content;
        $post->save();
        return redirect('/edit_post/' . $id)->with('success', 'Your post has been updated successfully');
    }

    function delete_post(Request $request, $id) {
        Post::find($id)->delete();
        return redirect('/my_posts/')->with('success', 'Your post has been deleted successfully');
    }

    //
}
