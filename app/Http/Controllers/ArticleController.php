<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\Article;
use App\Model\Workshop;
use Carbon\Carbon;
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

    public function show(Article $article, Request $request)
    {
        $lastActivity = Activity::where([

            ['session_id', $request->session()->getId()],
            ['record_id', $article->id],
            ['created_at', '>', Carbon::now()->subMinutes(config("app.activity.interval"))->toDateTimeString()]
        ])
        ->latest()->first();

        if ($lastActivity == null) {

            $activity = new Activity([

                'record_class' => Article::class,
                'record_id' => $article->id,
                'user_id' => $request->user() != null ? $request->user()->id : null,
                'user_agent' => $request->userAgent(),
                'session_id' => $request->session() != null ? $request->session()->getId() : null
            ]);
            $activity->save();
        }

        return response()->view('article.frontend.article.index', ['article' => $article]);
    }

    public function showArticleUpdate(Article $article)
    {
        return response()->view('article.backend.crud.update',['article' => $article]);
    }
}
