<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);
    
        // Create the service
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    
        // Redirect to the services index page
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }
    

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit($id)
    {
    // Find the service by ID
    $service = Service::findOrFail($id);

    // Return the edit view with the service data
    return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);
    
        // Find the service by ID
        $service = Service::findOrFail($id);
    
        // Update the service fields
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
    
        // Save the updated service to the database
        $service->save();
    
        // Redirect to the services index with a success message
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }
    

    public function destroy($id)
{
    // Find the service by ID and delete it
    $service = Service::findOrFail($id);
    $service->delete();

    // Redirect to the service index page with success message
    return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
}

}
