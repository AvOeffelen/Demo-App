<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkshopRequest;
use App\Model\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function store(StoreWorkshopRequest $request)
    {
        Workshop::created([
            'name' => $request->get('name'),
            'workshop_category_id' => $request->get('workshop_category_id'),
            'description' => $request->get('description'),
            'agenda_link' => $request->get('agenda_link'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'image_location' => $request->get('image_location'),
            'image_name' => $request->get('image_name'),
        ]);
    }
}
