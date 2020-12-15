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
        $uploadingImage = $request->get('uploadImage');
        if($uploadingImage === "false"){
            $hasVideo = true;
        }

        $article = Article::create([
            'title' => $request->get('title'),
            'has_video' => $hasVideo,
            'category_id' => $request->get('category_id'),
            'text' => $request->get('text'),
            'video_link' => $request->get('video_link'),
        ]);

        if($uploadingImage === "true"){
            $this->uploadImage($request->file('image'), $article);
        }

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
        ], [
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
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getAllArticles(): string
    {
        return Article::with('Category')->get()->toJson();
    }

    public function getAllCategories()
    {
        $content = Category::with('Article')->where('name','!=','1 op 1')->where('name','!=','Actueel')->get();

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
}
