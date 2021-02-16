<?php

namespace App\Http\Controllers\Axios\Management;

use App\Http\Controllers\Controller;
use App\Model\Activity;
use App\Model\Category;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ChartController extends Controller {

    /**
     * @return array
     */
    public function pagesPerVisit(): array {

        return compact();
    }

    public function userData(): \Illuminate\Database\Eloquent\Collection|array {

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
                    ? $groupedMonths[$dt->format("F Y")]
                    : new Collection()
            );
        }

        return $monthObject;
    }

    public function userLoginData() {

        $start = Carbon::now()->ceilMonth()->subYear();

        return Activity::whereDate('created_at','>', $start)
            ->where("record_class", User::class)
            ->with("User")
            ->get()
            ->groupBy("User.gender")
            ->map(fn($group) => $this->mapActivityGroupByMonth($group, $start)->map(function($d) {

                return $d->count();
            }));
    }

    public function visitsPerMonth() {

        $start = Carbon::now()->ceilMonth()->subMonths(6);

        return Activity::whereDate('created_at','>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->groupBy(function ($item, $key) {
                return $item->User->gender ?? "unknown";
            })
            ->map(fn($group) => $this->mapActivityGroupByMonth($group, $start)->map(function($d) {

                return $d->count();
            }));
    }

    public function visitsPerMonthGender() {

        $start = Carbon::now()->ceilMonth()->subMonths(6);

        return Activity::whereDate('created_at','>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->groupBy(function ($item, $key) {
                return $item->User->gender ?? "unknown";
            })
            ->map(fn($group) => $group->count());
    }

    public function visitsPerMonthUnique() {

        $start = Carbon::now()->ceilMonth()->subMonths(6);

        return Activity::whereDate('created_at','>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->groupBy(function ($item, $key) {

                return $item->User->gender ?? "unknown";
            })
            ->map(fn($genderGroup) => $this->mapActivityGroupByMonth($genderGroup, $start))
            ->map(function ($monthGroup) {

                return $monthGroup->map(function($activityGroup) {

                    return $activityGroup->groupBy(function ($item, $key) {

                        return $item->user_id != null ? $item->user_id : $item->session_id;
                    })
                    ->count();
                });
            });
    }

    public function visitsPerMonthUniqueGender() {

        $start = Carbon::now()->ceilMonth()->subMonths(6);

        return Activity::whereDate('created_at','>', $start)
            ->where("record_class", "!=", User::class)
            ->with("User")
            ->get()
            ->groupBy(function ($item, $key) {

                return $item->User->gender ?? "unknown";
            })
            ->map(function ($genderGroup) {

                return $genderGroup->groupBy(function ($item, $key) {

                    return $item->user_id != null ? $item->user_id : $item->session_id;
                })
                ->count();
            });
    }

    public function visitsPerRecordTypePerGender(Request $request) {

        $start = Carbon::now()->ceilMonth()->subMonths(6);

        $type = "App\\Model\\" . $request->query('type');
        $gender = $request->query("gender");

        if ($type == null || $gender == null) {

            return new Collection();
        }

        return Activity::whereDate('created_at','>', $start)
            ->with("User")
            ->where("record_class", "=", $type)
            ->get()
            ->where('User.gender', '=', $gender)
            ->countBy('Record.title')
            ->sortDesc()
            ->take(3);
    }
}
