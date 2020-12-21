<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityCalenderController extends Controller
{
	/**
	* Download function for activity calender
	*/
    public function downloadActivityCalender ()
    {
    	return Storage::download('/public/pdf/activiteitenkalender.pdf');
    }
}
