<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services (title + status only)
     */
    public function index()
    {
        // Paginate services for clean navigation (10 per page)
        $services = Service::latest()->paginate(10);

        return view('services.index', compact('services'));
    }

    /**
     * Display a single service with full description
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
