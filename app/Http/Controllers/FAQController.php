<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function showFAQ()
    {
        return view('faq.index');
    }
    
    public function showGenManagement()
    {
        return view('generatiemanagement.index');
    }
    public function showVragenlijsten()
    {
        return view('questionaires.index');
    }
    public function showGoodHabitz()
    {
        return view('goodhabitz.index');
    }
    public function showActiviteitenkalender()
    {
        return view('activiteitenkalender.index');
    }
    public function showContact()
    {
        return view('contact.index');
    }
}