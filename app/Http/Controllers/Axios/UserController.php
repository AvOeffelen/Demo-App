<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvatarRequest;
use App\Model\Article;
use App\User;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

    /**
     * @param StoreAvatarRequest $request
     *
     * @param User $user
     *
     * @return JsonResponse
     */
    public function storeAvatar(StoreAvatarRequest $request): JsonResponse
    {
        $user = User::where('email',$request->get('user'))->first();
        $image = $request->file('avatar');
        $uploadedImage = $this->uploadImage($image, $user);
        Log::info("TRYING TO UPload image", [$uploadedImage]);
        if($uploadedImage){
            $user = $user->fresh();
            return response()->json(['message' => 'Avatar successvol geupload','data' => $user]);
        }

        return response()->json(['message' => 'Something went wrong.'],422);
    }


    /**
     * @param $image
     * @param User $user
     *
     * @return bool
     */
    public function uploadImage($image, User $user): bool
    {
        try {
            $fileName = Str::random(15) . '.' . $image->getClientOriginalExtension();

            $image->storePubliclyAs('avatars', $fileName, 'public');

            $user->avatar->image_link = 'storage/avatars/' . $fileName;
            $user->avatar->save();

            return true;
        } catch (\Exception $e) {
            Log::info("[EXCEPTION]",[$e->getMessage()]);
            return false;
        }
    }
}
