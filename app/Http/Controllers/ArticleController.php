<?php

namespace App\Http\Controllers;

use App\Model\Article;
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

    public function showArticles()
    {
        return response()->view('article.frontend.articles.index');
    }

    public function showOneOnOne()
    {
        return response()->view('article.frontend.one_on_one.index');
    }

    public function topical()
    {
        return response()->view('article.frontend.topical.index');
    }

    public function covid()
    {
        return response()->view('article.frontend.covid.index');
    }

    public function show(Article $article)
    {
        return response()->view('article.frontend.article.index', ['article' => $article]);
    }

    public function showArticleUpdate(Article $article)
    {
        return response()->view('article.backend.crud.update',['article' => $article]);
    }
}
