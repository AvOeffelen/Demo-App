<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\Workshop;
use Carbon\Carbon;
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

    public function show(Workshop $workshop, Request $request)
    {
        $lastActivity = Activity::where([

            ['session_id', $request->session()->getId()],
            ['record_id', $workshop->id],
            ['created_at', '>', Carbon::now()->subMinutes(config("app.activity.interval"))->toDateTimeString()]
        ])
        ->latest()->first();

        if ($lastActivity == null) {

            $activity = new Activity([

                'record_class' => Workshop::class,
                'record_id' => $workshop->id,
                'user_id' => $request->user() != null ? $request->user()->id : null,
                'user_agent' => $request->userAgent(),
                'session_id' => $request->session() != null ? $request->session()->getId() : null
            ]);

            $activity->save();
        }

        return response()->view('workshop.show.index', ['workshop' => $workshop]);
    }

    public function showCreate()
    {
        return view('workshop.admin.add_workshop.index');
    }
}
