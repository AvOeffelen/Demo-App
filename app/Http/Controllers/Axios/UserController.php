<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile()
    {

        return view('profile.index');
    }

    public function getFavorited()
    {
        return auth()->user()->workshop;
    }
}
