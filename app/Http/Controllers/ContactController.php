<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show form (web)
    public function index()
    {
        return view('contact');
    }

    // Save message to DB (web)
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    // API: Get all messages (admin only)
    public function apiIndex()
    {
        // You can protect this with middleware later
        return response()->json(Contact::latest()->get());
    }
}
