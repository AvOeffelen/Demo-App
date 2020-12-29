<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFileUploadRequest;
use App\Http\Requests\FileUploadRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
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
     * @param $image
     * @param Article $article
     *
     * @return bool
     */
    public function uploadImage($image, Article $article): bool
    {
        try {

            $fileName = Str::random(15) . '.' . $image->getClientOriginalExtension();

            $image->storePubliclyAs('images', $fileName, 'public');

            $article->image_link = 'storage/images/' . $fileName;
            $article->save();

            return true;
        } catch (\Exception $e) {

            return false;
        }
    }

    /**
     * @param StoreArticleRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $hasVideo = false;
        $uploadSucceed = true;

        $uploadingImage = $request->get('uploadImage');

        if($uploadingImage === "false"){
            $hasVideo = true;
        }

        $article = Article::create([
            'title' => $request->get('title'),
            'has_video' => $hasVideo,
            'category_id' => (int) $request->get('category_id'),
            'text' => $request->get('text'),
            'button_text' => $request->get('button_text'),
            'button_link' => $request->get('button_link'),
            'video_link' => $request->get('video_link'),
        ]);

        if($uploadingImage === "true"){
            $image = $request->file('image');

            $uploadSucceed = $this->uploadImage($image , $article);
        }

        if(! $uploadSucceed) {
            return response()->json(['message' => 'Internal server error'],500);
        }

        return response()->json(['article' => $article]);
    }

    /**
     * @param UpdateArticleRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateArticleRequest $request): JsonResponse
    {
        $hasVideo = 0;
        $uploadingImage = $request->get('uploadImage');
        $changedImage = $request->get('changed_image');
        if($uploadingImage === "false"){
            $hasVideo = 1;
        }

        $article = Article::updateOrCreate([
            'id' => $request->get('id'),
        ], [
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'image_link' => $request->get('image_link'),
            'video_link' => $request->get('video_link'),
            'has_video' => $hasVideo,
            'text' => $request->get('text'),
        ]);

        if($uploadingImage === "true"){
            $this->uploadImage($request->file('image_link'), $article);
        }
        dd($article);
        return response()->json(['message' => 'success'],200);
    }

    /**
     * @param Article $article
     *
     * @throws \Exception
     */
    public function delete(Article $article)
    {
        $articleFile = str_replace("storage/",'public/',$article->image_link);

        Storage::delete($articleFile);

        try {
            $article->delete();
            return response()->json(['message' => 'Successfully deleted'], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getAllArticles()
    {
        $articles = Article::with('Category')->get();

        return $articles;
    }

    public function getAllCategories()
    {
        $content = Category::with('Article')->where('name','!=','1 op 1')->where('name','!=','Actueel')->where('name','!=','Covid')->get();

        return $content;
    }

    public function getOneOnOneCategory()
    {
        $content = Category::with('Article')->where('name','=','1 op 1')->get();

        return $content;
    }
    public function getTopicalCategory()
    {
        $content = Category::with('Article')->where('name','=','Actueel')->get();

        return $content;
    }

    public function getCovidCategory()
    {
        $content = Category::with('Article')->where('name','=','Covid')->get();

        return $content;
    }

    public function showArticleUpdate(Article $article)
    {
        return response()->view('article.backend.crud.update',['article' => $article]);
    }
}
