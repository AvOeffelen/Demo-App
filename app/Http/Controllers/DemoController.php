<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function showAdminWorkshopAdd()
    {
        return view('workshop.admin.add_workshop.index');
    }

    public function showWorkShops()
    {
        return view('workshop.workshop.index');
    }

    public function showWorkshop()
    {
        return view('workshop.workshop.template.workshop.index');
    }

    public function showProfile()
    {

        return view('profile.index');
    }

    public function showFAQ()
    {
        return view('faq.index');
    }

    public function testboard()
    {
        return view('dashboard.frontend.index');
    }
}
