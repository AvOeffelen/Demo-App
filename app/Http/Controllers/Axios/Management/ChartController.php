<?php

namespace App\Http\Controllers\Axios\Management;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Collection;


class ChartController extends Controller
{
    /**
     * @return Collection
     */
    public function pagesPerVisit(): Collection {



        return compact();
    }
}
