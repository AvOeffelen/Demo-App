<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFileUploadRequest;
use App\Http\Requests\FileUploadRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Mail\ArticleSignUpMail;
use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
            Log::error("[ARTICLE IMAGE UPLOAD FAILURE] Failed to upload image", [$e->getMessage()]);
            return false;
        }
    }

    function remove_http($url) {
        $disallowed = array('http://', 'https://');
        foreach($disallowed as $d) {
            if(strpos($url, $d) === 0) {
                return str_replace($d, '', $url);
            }
        }
        return $url;
    }
    /**
     * @param StoreArticleRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $buttonlink = $this->remove_http($request->get('button_link'));

        $article = Article::create([
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'category_id' => (int) $request->get('category_id'),
            'text' => $request->get('text'),
            'button_text' => $request->get('button_text'),
            'button_link' => $buttonlink,
            'video_link' => $request->get('video_link'),
            'show_contact' => $request->get('show_contact') ? 1 : 0 ,
        ]);

        $image = $request->file('image');
        $uploadSucceed = $this->uploadImage($image , $article);

        if(!$uploadSucceed){
            return response()->json(['message' => 'Internal server error'],500);
        }

        return response()->json(['message' => 'success']);
    }

    /**
     * @param UpdateArticleRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateArticleRequest $request): JsonResponse
    {
        $changedImage = $request->get('changed_image') ? $request->get('changed_image') : "false" ;

        $buttonlink = $this->remove_http($request->get('button_link'));

        $article = Article::updateOrCreate([
            'id' => $request->get('id'),
        ], [
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'category_id' => (int) $request->get('category_id'),
            'image_link' => $request->get('image_link'),
            'video_link' => $request->get('video_link'),
            'button_text' => $request->get('button_text'),
            'button_link' => $buttonlink,
            'text' => $request->get('text'),
            'show_contact' => $request->get('show_contact') ? 1 : 0 ,
        ]);

        $uploadSucceed = true;

        if($changedImage ==="true") {
            $uploadSucceed = $this->uploadImage($request->file('image_link'), $article);
        }

        if(!$uploadSucceed){
            return response()->json(['message' => 'Internal server error'],500);
        }

        return response()->json(['message' => 'success']);
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

    public function getAllArticles():JsonResponse
    {
        $articles = Article::with('Category')->get();

        return response()->json(['data' => $articles]);
    }

    public function getAllCategories()
    {
        $content = Category::with('Article')
            ->where('name','!=','persoonlijke_begeleiding')
            ->where('name','!=','actueel')
            ->where('name','!=','covid')
            ->get();

        return $content;
    }

    public function getOneOnOneCategory()
    {
        $content = Category::with('Article')
            ->where('name','=','persoonlijke_begeleiding')
            ->get();

        return $content;
    }
    public function getTopicalCategory()
    {
        $content = Category::with('Article')
            ->where('name','=','actueel')
            ->get();

        return $content;
    }

    public function getCovidCategory()
    {
        $content = Category::with('Article')
            ->where('name','=','covid')
            ->get();

        return $content;
    }

    public function showArticleUpdate(Article $article)
    {
        return response()->view('article.backend.crud.update',['article' => $article]);
    }

    /**
     * @param Request $request
     * @param Article $article
     *
     * @return JsonResponse
     */
    public function signUpForArticle(Request $request, Article $article)
    {
        Mail::to('info@vitalavie.nl')->send(new ArticleSignUpMail($article,$request->toArray()));
        return response()->json(['message' => 'Aanvraag succesvol verstuurd!']);
    }

    /**
     * @return JsonResponse
     */
    public function getAllArticlesForStandardCategories(): JsonResponse
    {
        $articles = Article::whereIn('category_id',['2','3','4'])->With('category')->get();
        return response()->json(['data' => $articles]);
    }

    /**
     * @param Article $article
     *
     * @return bool
     */
    public function checkIfUserHasLiked(Article $article): bool
    {
        return $article->userFavorites->contains(auth()->user());
    }


    /**
     * @param Article $article
     *
     * @return bool
     */
    public function like(Article $article): bool
    {
        $user = auth()->user();
        $article->userFavorites()->attach($user->id);

        if($this->checkIfUserHasLiked($article) === true){
            return true;
        }
        return false;
    }

    /**
     * @param Article $article
     *
     * @return bool
     */
    public function dislike(Article $article): bool
    {
        $user = auth()->user();

        $article->userFavorites()->detach($user->id);

        $article->fresh();

        if($this->checkIfUserHasLiked($article) === true){
            return false;
        }
        return true;
    }
}
