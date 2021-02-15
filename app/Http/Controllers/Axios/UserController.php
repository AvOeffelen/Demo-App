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
        Log::info("[UPLOADINGA AVATAR]", [$uploadedImage]);
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
