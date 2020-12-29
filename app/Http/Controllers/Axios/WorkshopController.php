<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUploadRequest;
use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Http\Requests\WorkshopSignUpRequest;
use App\Mail\WorkshopSignUpMail;
use App\Model\Article;
use App\Model\Workshop;
use App\Model\WorkshopCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class WorkshopController extends Controller
{
    /**
     * @param StoreWorkshopRequest $request
     *
     */
    public function store(StoreWorkshopRequest $request)
    {
        $image = $request->file('image');
        $workshop = Workshop::create([
            'title' => $request->get('title'),
            'workshop_category_id' => (int) $request->get('workshop_category_id'),
            'text' => $request->get('text'),
            'agenda_link' => $request->get('agenda_link'),
            'start' => Carbon::parse($request->get('start')),
            'end' => Carbon::parse($request->get('end')),
        ]);

        if($image != null){
            $this->uploadImage($request->file('image'), $workshop);

        }
        $workshop = $workshop->fresh();
        return response()->json(['workshop' => $workshop], 200);
    }


    /**
     * @param $image
     * @param Workshop $workshop
     *
     * @return bool
     */
    public function uploadImage($image, Workshop $workshop): bool
    {
        try {

            $fileName = Str::random(15) . '.' . $image->getClientOriginalExtension();

            $image->storePubliclyAs('images', $fileName, 'public');

            $workshop->image_name = 'storage/images/' . $fileName;
            $workshop->save();

            return true;
        } catch (\Exception $e) {

            return false;
        }
    }
    /**
     * @param UpdateWorkshopRequest $request
     *
     * @return Workshop
     */
    public function update(UpdateWorkshopRequest $request): Workshop
    {
        dd($request->all());
        $changedImage = $request->get('changed_image');
        $agendaLink = $request->get('agenda_link');
        if($agendaLink === "null"){
            $agendaLink = null;
        }

        $workshop = Workshop::updateOrCreate([
            'id' => $request->get('id'),
        ],
            [
                'title' => $request->get('title'),
                'workshop_category_id' => (int) $request->get('workshop_category_id'),
                'agenda_link' => $agendaLink,
                'start' => $request->get('start'),
                'end' => $request->get('end'),
                'image_location' => $request->get('image_location'),
                'image_name' => $request->get('image_name'),
            ]);

        if($changedImage === "true"){
            $this->uploadImage($request->file('image_link'), $workshop);
        }

        return $workshop;
    }

    /**
     * @param Workshop $workshop
     *
     * @throws \Exception
     */
    public function delete(Workshop $workshop)
    {
        $articleFile = str_replace("storage/",'public/',$workshop->image_name);

        Storage::delete($articleFile);
        try {
            $workshop->delete();
            return response()->json(['message' => 'Successfully deleted'], 200);
        } catch (\Exception $exception){
            return $exception;
        }
    }
    /**
     * @param Request $request
     *
     * @return bool
     */
    public function like(Workshop $workshop): bool
    {
        $user = auth()->user();
        $workshop->userFavorites()->attach($user->id);

        if($this->checkIfUserHasLiked($workshop) === true){
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function dislike(Workshop $workshop): bool
    {
        $user = auth()->user();

        $workshop->userFavorites()->detach($user->id);

        $workshop->fresh();

        if($this->checkIfUserHasLiked($workshop) === true){
            return false;
        }
        return true;
    }

    /**
     * @return String
     */
    public function getAllWorkshops(): String
    {
        return Workshop::with('Category')->WithCount('userFavorites')->get()->toJson();
    }

    /**
     * @return Collection
     */
    public function getAllPhysicalVitalityWorkshops(): Collection
    {
        return Workshop::where('workshop_category_id','1')->withCount('UserFavorites')->get();
    }

    /**
     * @return Collection
     */
    public function getAllMentalVitalityWorkshops(): Collection
    {
        return Workshop::where('workshop_category_id','2')->withCount('UserFavorites')->get();
    }

    /**
     * @return Collection
     */
    public function getAllGrowthWorkshops(): Collection
    {
        return Workshop::where('workshop_category_id','3')->withCount('UserFavorites')->get();
    }

    /**
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        $content = WorkshopCategory::with('Workshop')->get();

        return $content;
    }

    /**
     * @param Workshop $workshop
     *
     * @return bool
     */
    public function checkIfUserHasLiked(Workshop $workshop): bool
    {
        return $workshop->userFavorites->contains(auth()->user());
    }

    public function signUpForWorkshop(WorkshopSignUpRequest $request, Workshop $workshop)
    {
        Mail::to('info@vitalavie.nl')->send(new WorkshopSignUpMail($workshop,$request->toArray()));
        return response()->json(['message' => 'U bent succesvol aangemeld!']);
    }
}
