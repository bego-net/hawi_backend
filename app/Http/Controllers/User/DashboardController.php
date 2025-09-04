<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Project;         // ✅ Import Project Model
use App\Models\ServiceRequest;  // ✅ Import ServiceRequest Model
use App\Models\SupportMessage;  // ✅ Import SupportMessage Model

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // ✅ Count user's projects
        $projectsCount = Project::where('user_id', $userId)->count();

        // ✅ Average project progress
        $avgProgress   = Project::where('user_id', $userId)->avg('progress') ?? 0;

        // ✅ Group projects by status
        $projectByStatus = Project::select('status', DB::raw('COUNT(*) as total'))
            ->where('user_id', $userId)
            ->groupBy('status')
            ->pluck('total', 'status');

        // ✅ Get latest 5 service requests
        $requests = ServiceRequest::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        // ✅ Get latest 5 messages
        $messages = SupportMessage::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        // ✅ Send all data to dashboard view
        return view('user.dashboard.index', compact(
            'projectsCount',
            'avgProgress',
            'projectByStatus',
            'requests',
            'messages'
        ));
    }
}
