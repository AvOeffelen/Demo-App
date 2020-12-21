<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if(auth()->user()->isAdmin()){
                return response()->view('workshop.admin.overview.index');
            }else {
                return response()->view('dashboard.frontend.index');
            }
        }
        return response()->view('dashboard.frontend.index');

    }

}
