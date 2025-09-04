<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function index()
{
    $projects = Project::where('user_id', Auth::id())->get();

    return view('user.projects.index', compact('projects'));
}


    public function create()
    {
        return view('user.projects.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'progress' => 'nullable|integer|min:0|max:100',
            'status' => 'required|string',
        ]);
    
        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'progress' => $request->progress ?? 0,
            'status' => $request->status,
        ]);
    
        return redirect()->route('dashboard.projects.index')
                         ->with('success', 'Project created successfully!');
    }
    


    public function edit(Project $project)
{
    // Ensure only project owner can edit
    if ($project->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('user.projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    // Ensure only project owner can update
    if ($project->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'progress' => 'nullable|integer|min:0|max:100',
        'status' => 'required|string',
    ]);

    $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'progress' => $request->progress ?? 0,
        'status' => $request->status,
    ]);

    return redirect()->route('dashboard.projects.index')
                     ->with('success', 'Project updated successfully!');
}


    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully');
    }
}
