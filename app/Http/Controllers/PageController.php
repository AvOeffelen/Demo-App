<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showFAQ()
    {
        return view('faq.index');
    }
    public function showGenManagement()
    {
        return view('generatiemanagement.index');
    }
}
