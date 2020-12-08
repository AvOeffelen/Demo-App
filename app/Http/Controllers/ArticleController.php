<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function showOverview()
    {
        return response()->view('article.backend.overview.index');
    }

    public function showCreate()
    {
        return response()->view('article.backend.crud.create');
    }
}
