<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    }
}
