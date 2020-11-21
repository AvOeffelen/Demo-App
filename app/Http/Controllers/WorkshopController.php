<?php

namespace App\Http\Controllers;

use App\Model\Workshop;
use http\Env\Response;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {

    }

    /**
     * @param Request $request
     *
     * @return Workshop
     */
    public function loadWorkshop(Request $request): Workshop
    {
        return Workshop::where('id', $request->id)->withCount('User')->firstOrFail();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function showOverview()
    {
        return response()->view('workshop.admin.overview.index');
    }

    /**
     * @param Workshop $workshop
     *
     */
    public function updateWorkshop(Workshop $workshop)
    {
        return response()->view('workshop.admin.update_workshop.index', ['workshop' => $workshop]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function showWorkshops()
    {
        return response()->view('workshop.overview.index');
    }

    public function show(Workshop $workshop)
    {
        return response()->view('workshop.show.index', ['workshop' => $workshop]);
    }
}
