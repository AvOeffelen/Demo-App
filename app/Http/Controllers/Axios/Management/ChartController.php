<?php

namespace App\Http\Controllers\Axios\Management;

use App\Http\Controllers\Controller;
use App\Model\Activity;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tile;
use App\Model\Workshop;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ChartController extends Controller {

    public function userData() {

        return User::all()
            ->countBy(
                function ($user) {

                    return $user->gender;
                }
            )
            ->put("new", User::whereMonth('created_at', Carbon::now()->month)->count());
    }

    private function mapActivityGroupByMonth($group, $start) {

        $period = CarbonPeriod::create($start, Carbon::now());

        $groupedMonths = $group->groupBy(

            function ($activity) {

                return Carbon::parse($activity->created_at)->format("F Y");
            }
        );

        $monthObject = collect([]);

        foreach ($period as $dt) {

            $monthObject->put(
                $dt->format("F Y"),
                $groupedMonths->has($dt->format("F Y"))
                    ? $groupedMonths[ $dt->format("F Y") ]
                    : new Collection()
            );
        }

        return $monthObject;
    }

    public function userLoginData() {

        $start = Carbon::now()->ceilMonth()->subYear();

        return Activity::whereDate('created_at', '>', $start)
            ->where("record_class", User::class)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(
                function($group) use ($start) {
                    return $this->mapActivityGroupByMonth($group, $start)->map(
                         function ($d) {

                             return $d->count();
                         }
                     );
                }
            );
    }

    public function visitsPerMonth() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        return Activity::whereDate('created_at', '>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item, $key) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(
                function($group) use ($start) {
                    return $this->mapActivityGroupByMonth($group, $start)->map(
                        function ($d) {

                            return $d->count();
                        }
                    );
                }
            );
    }

    public function visitsPerMonthGender() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        return Activity::whereDate('created_at', '>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item, $key) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(function($group) {
                return $group->count();
            });
    }

    public function visitsPerMonthUnique() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        return Activity::whereDate('created_at', '>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item, $key) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(function ($genderGroup) use ($start) {
                return $this->mapActivityGroupByMonth($genderGroup, $start);
            })
            ->map(
                function ($monthGroup) {

                    return $monthGroup->map(
                        function ($activityGroup) {

                            return $activityGroup->groupBy(
                                function ($item, $key) {

                                    return $item->user_id != null ? $item->user_id : $item->session_id;
                                }
                            )
                                ->count();
                        }
                    );
                }
            );
    }

    public function visitsPerMonthUniqueGender() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        return Activity::whereDate('created_at', '>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item, $key) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(
                function ($genderGroup) {

                    return $genderGroup->groupBy(
                        function ($item, $key) {

                            return $item->user_id != null ? $item->user_id : $item->session_id;
                        }
                    )
                        ->count();
                }
            );
    }

    public function visitsPerRecordTypePerGender(Request $request) {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        if ($request->query('type') == null) {

            return new Collection();
        }

        $type = "App\\Model\\" . $request->query('type');
        $gender = $request->query("gender");

        return Activity::whereDate('created_at', '>', $start)
            ->with("User")
            //@TODO: Change following when statements to only '->where("record_class", "=", $type);'.
            // This ugly solution is required because homepage tiles aren't stored in the database.
            //->where("record_class", "=", $type)
            ->when($request->query("type") !== "Tile", function ($q) use ($type) {

                return $q->where("record_class", "=", $type);
            })
            ->when($request->query("type") === "Tile", function ($q) {

                return $q->where("route_name", "=", "activiteitenkalender")
                    ->orWhere("route_name", "=", "workshop")
                    ->orWhere("route_name", "=", "oneOnOne")
                    ->orWhere("route_name", "=", "covid")
                    ->orWhere("route_name", "=", "vragenlijsten")
                    ->orWhere("route_name", "=", "articles")
                    ->orWhere("route_name", "=", "goodhabitz")
                    ->orWhere("route_name", "=", "topical");
            })
            ->get()
            ->when(
                $gender != null,
                function ($q) use ($gender) {

                    return $q->where('User.gender', '=', $gender);
                }
            )
            //TODO: See Above
            //->countBy('Record.title')
            ->when($request->query("type") !== "Tile", function ($q) use ($type) {

                return $q->countBy('Record.title');
            })
            ->when($request->query("type") === "Tile", function ($q) {

                return $q->countBy('route_name');
            })
            ->sortDesc()
            ->take(intval($request->input("limit", 3)));
    }

    public function activityPerRecordTypePerUseragent(Request $request) {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        if ($request->query('type') == null) {

            return new Collection();
        }

        $gender = $request->query("gender");
        $type = "App\\Model\\" . $request->query('type');

        $deviceUAKeys = new Collection();

        return Activity::whereDate('created_at', '>', $start)
            ->with("User")
            //@TODO: Change following when statements to only '->where("record_class", "=", $type);'.
            // This ugly solution is required because homepage tiles aren't stored in the database.
            //->where("record_class", "=", $type);
            ->when($request->query("type") !== "Tile", function ($q) use ($type) {

                return $q->where("record_class", "=", $type);
            })
            ->when($request->query("type") === "Tile", function ($q) {

                return $q->where("route_name", "=", "activiteitenkalender")
                    ->orWhere("route_name", "=", "workshop")
                    ->orWhere("route_name", "=", "oneOnOne")
                    ->orWhere("route_name", "=", "covid")
                    ->orWhere("route_name", "=", "vragenlijsten")
                    ->orWhere("route_name", "=", "articles")
                    ->orWhere("route_name", "=", "goodhabitz")
                    ->orWhere("route_name", "=", "topical");
            })
            ->get()
            ->when(
                $gender != null,
                function ($q) use ($gender) {

                    return $q->where('User.gender', '=', $gender);
                }
            )
            //@TODO: See Above
            //->groupBy("Record.title")
            ->when($request->query("type") !== "Tile", function ($q) use ($type) {

                return $q->groupBy('Record.title');
            })
            ->when($request->query("type") === "Tile", function ($q) {

                return $q->groupBy('route_name');
            })
            ->sortDesc()
            ->take(intval($request->input("limit", 3)))
            ->map(function ($group) {

                return $group->countBy(function ($item) {

                    $parseResult = new \WhichBrowser\Parser($item->user_agent);

                    return $parseResult->device->toString() != null && $parseResult->device->toString() !== "" ? $parseResult->device->toString() : $parseResult->getType();
                });
            })
            ->each(function ($group) use ($deviceUAKeys) {

                $group->each(function ($item, $key) use ($deviceUAKeys) {

                    if (!$deviceUAKeys->has($key)) {

                        $deviceUAKeys->push($key);
                    }
                });
            })
            ->map(function ($group) use ($deviceUAKeys) {

                foreach ($deviceUAKeys as $ua) {

                    if (!$group->has($ua)) {

                        $group->put($ua, 0);
                    }
                }

                return $group;
            });
    }

    public function genderPerRecordTypePerUseragent(Request $request) {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));
        $genders = new Collection();

        return Activity::whereDate('created_at', '>', $start)
            ->with("User")
            ->get()
            ->whereNotNull("User.gender")
            ->groupBy(
                function ($item) {

                    return $item->User->gender ?? "onbekend";
                }
            )
            ->map(function ($group) {
                return $group->countBy(function ($item) {

                    $parseResult = new \WhichBrowser\Parser($item->user_agent);

                    return $parseResult->device->toString() != null && $parseResult->device->toString() !== "" ? $parseResult->device->toString() : $parseResult->getType();
                });
            })
            ->each(function ($group) use ($genders) {

                $group->each(function ($item, $key) use ($genders) {

                    if (!$genders->has($key)) {

                        $genders->push($key);
                    }
                });
            })
            ->map(function ($group) use ($genders) {

                foreach ($genders as $gender) {

                    if (!$group->has($gender)) {

                        $group->put($gender, 0);
                    }
                }

                return $group;
            });
    }

    public function dashboardData() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        $visits = $this->visitsPerMonthUnique()->map(function($group) {
            return $group->sum();
        })->sum();
        $views = $this->visitsPerMonth()->map(function($group) {
            return $group->sum();
        })->sum();

        return compact("visits", "views");
    }

    public function activityData() {

        $start = Carbon::now()->ceilMonth()->subMonths(config("app.activity.monthSpan"));

        $topDevice = Activity::whereDate('created_at', '>', $start)
            ->get()
            ->groupBy(function ($item) {

                return (new \WhichBrowser\Parser($item->user_agent))->getType();
            })
            ->sortDesc()
            ->map(function ($item, $key) {

                return $key;
            })
            ->first();

        $articleClicks = Activity::whereDate('created_at', '>', $start)
            ->with("User")
            ->where("record_class", "=", Article::class)
            ->count();

        $workshopClicks = Activity::whereDate('created_at', '>', $start)
            ->with("User")
            ->where("record_class", "=", Workshop::class)
            ->count();

        //TODO: Implement this system instead of the ugly system below.
        // But for this to work, homepage tiles need to be stored in the database.
//        $tileClicks = Activity::whereDate('created_at', '>', $start)
//            ->with("User")
//            ->where("record_class", "=", Tile::class)
//            ->count();

        $tileClicks = Activity::whereDate('created_at', '>', $start)
            ->with("User")
            ->where("route_name", "=", "activiteitenkalender")
                ->orWhere("route_name", "=", "workshop")
                ->orWhere("route_name", "=", "oneOnOne")
                ->orWhere("route_name", "=", "covid")
                ->orWhere("route_name", "=", "vragenlijsten")
                ->orWhere("route_name", "=", "articles")
                ->orWhere("route_name", "=", "goodhabitz")
                ->orWhere("route_name", "=", "topical")
            ->count();

        return compact(
            "topDevice", "articleClicks",
            "workshopClicks", "tileClicks"
        );
    }
}
