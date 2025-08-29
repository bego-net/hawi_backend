<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function about() {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    public function contact() {
        return view('pages.contact');
    }
}
