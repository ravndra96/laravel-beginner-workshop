<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function view(Request $request){
        return view('pages.dashboard');
    }
    //
}
