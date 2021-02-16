<?php


namespace App\Http\Middleware;

use App\Model\Activity;
use App\Model\Workshop;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;


class RecordActivity {

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param $next
     *
     * @return mixed
     */
    public function handle($request, $next) {

        $entity = collect($request->route()->parameters())->last();

        $lastVisit = Activity::where([

            ['session_id', $request->session()->getId()],
            $entity != null
                ? ['record_id', $entity->id]
                : ['route_name', $request->route()->getName()],
            ['created_at', '>', Carbon::now()->subMinutes(config("app.activity.interval"))->toDateTimeString()]
        ])
        ->latest()->first();

        if ($lastVisit == null) {

            $activityOptions = collect([

                'route_name' => $request->route()->getName(),
                'user_id' => $request->user() != null ? $request->user()->id : null,
                'user_agent' => $request->userAgent(),
                'session_id' => $request->session() != null ? $request->session()->getId() : null
            ]);

            if ($entity != null) {

                $activityOptions->put('record_class', $entity::class);
                $activityOptions->put('record_id', $entity->id);
            }

            $activity = new Activity($activityOptions->toArray());
            $activity->save();
        }

        return $next($request);
    }
}
