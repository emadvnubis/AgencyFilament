<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {

        $services = Service::all();

        $why_us = WhyUs::where('is_featured', true)->get();

        return view('welcome',[
            'services' => $services,
            'why_us' => $why_us
        ]);
    }
}
