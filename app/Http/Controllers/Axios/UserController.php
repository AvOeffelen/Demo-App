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

    public function getFavoriteWorkshops()
    {
        return auth()->user()->workshop;
    }

    public function getFavoriteArticles()
    {
        return auth()->user()->article;
    }
}
