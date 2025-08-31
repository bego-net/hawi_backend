<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show all contact messages.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show a single contact message with responses.
     */
    public function show($id)
    {
        $contact = Contact::with('responses.admin')->findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Store admin response & send email to the user.
     */
    public function respond(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|max:5000',
        ]);

        $contact = Contact::findOrFail($id);

        // Save response in DB
        $response = ContactResponse::create([
            'contact_id' => $contact->id,
            'admin_id'   => Auth::id(),
            'response'   => $request->response,
        ]);

        // Send response email to the user
        Mail::raw(
            "Hello {$contact->name},\n\nWe have responded to your message:\n\n{$response->response}\n\nBest regards,\nYour Support Team",
            function ($message) use ($contact) {
                $message->to($contact->email)
                        ->subject("Response to your contact message");
            }
        );

        return redirect()->route('admin.contacts.show', $contact->id)
                         ->with('success', 'Response saved & emailed successfully.');
    }
}
