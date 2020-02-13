<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('pages.welcome'); //default return view('welcome');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('', 'RegisterController@view');
    Route::post('', 'RegisterController@save');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('', 'LoginController@view');
    Route::post('', 'LoginController@makeLogin');
});
Route::group(['middleware' => 'login_check'], function () {
    Route::get('my_posts', 'MyPostController@view');
    Route::get('create_post', 'MyPostController@create_post');
});
Route::get('logout', 'LoginController@logout');
