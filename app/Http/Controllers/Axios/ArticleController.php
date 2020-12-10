<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Model\Article;
use App\Model\Category;
use http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        $category = Category::with('SubCategory')->get();

        return $category;
    }



    /**
     * @param Request $request
     *
     * @return Article
     */
    public function uploadImage(Request $request): Article
    {

        $article = Article::findOrFail($request->get('article_id'));

        $file = $request->file('image');

        $fileName =  Str::random(15).'.'.$file->getClientOriginalExtension();

        $file->storePubliclyAs('images',$fileName,'public');

        $article->image_link = 'storage/images/' . $fileName;
        $article->save();

        return $article;
    }

    /**
     * @param StoreArticleRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $article = Article::create([
            'title' => $request->get('title'),
            'has_video' => $request->get('has_video'),
            'category_id' => $request->get('category_id'),
            'text' => $request->get('text'),
            'video_link' => $request->get('video_link'),
        ]);

        return response()->json(['article' => $article], 200);
    }

    /**
     * @param UpdateArticleRequest $request
     *
     * @return Article
     */
    public function update(UpdateArticleRequest $request): Article
    {
        $article = Article::updateOrCreate([
            'id' => $request->get('id'),
        ],[
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'image_link' => $request->get('image_link'),
            'video_link' => $request->get('video_link'),
        ]);

        return $article;
    }


    /**
     * @param Article $article
     *
     * @throws \Exception
     */
    public function delete(Article $article)
    {

        try {
            $article->delete();
            return response()->json(['message' => 'Successfully deleted'], 200);
        } catch (\Exception $exception){
            return $exception;
        }
    }

    public function getAllArticles(): String
    {
        return Article::with('Category')->get()->toJson();
    }
}
