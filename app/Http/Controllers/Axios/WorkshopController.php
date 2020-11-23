<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Model\Workshop;
use App\Model\WorkshopCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * @param StoreWorkshopRequest $request
     *
     * @return Workshop
     */
    public function store(StoreWorkshopRequest $request): Workshop
    {
        return Workshop::create([
            'title' => $request->get('title'),
            'workshop_category_id' => $request->get('category_id'),
            'text' => $request->get('text'),
            'agenda_link' => $request->get('agenda_link'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'image_location' => $request->get('image_location'),
            'image_name' => $request->get('image_name'),
        ]);
    }

    /**
     * @param UpdateWorkshopRequest $request
     *
     * @return Workshop
     */
    public function update(UpdateWorkshopRequest $request): Workshop
    {
        return Workshop::updateOrCreate([
            'id' => $request->get('id'),
        ],
        [
            'title' => $request->get('title'),
            'workshop_category_id' => $request->get('workshop_category_id'),
            'description' => $request->get('description'),
            'agenda_link' => $request->get('agenda_link'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'image_location' => $request->get('image_location'),
            'image_name' => $request->get('image_name'),
        ]);
    }

    /**
     * @param Workshop $workshop
     *
     * @throws \Exception
     */
    public function delete(Workshop $workshop)
    {

        try {
            $workshop->delete();
        } catch (\Exception $exception){
            return $exception;
        }
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function like(Request $request): void
    {
        $user = auth()->user();

        $workshop = Workshop::where('id',$request->id)->firstOrFail();

        $workshop->User()->attach($user->id);
    }

    /**
     * @return String
     */
    public function getAllWorkshops(): String
    {
        return Workshop::with('Category')->withCount('UserFavorites')->get()->toJson();
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
}
