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
    // ✅ Show all messages
    public function index()
{
    $contacts = Contact::latest()->paginate(10);
    return view('admin.contacts.index', compact('contacts'));
}


    // ✅ Show single message
    public function show($id)
{
    $contact = Contact::findOrFail($id);
    return view('admin.contacts.show', compact('contact'));
}


    // ✅ Respond to message
    public function respond(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|max:5000',
        ]);

        $message = Contact::findOrFail($id);

        // Store response
        $response = new ContactResponse();
        $response->contact_id = $message->id;
        $response->admin_id = Auth::id();
        $response->response = $request->response;
        $response->save();

        // Optionally send email to user
        Mail::raw($request->response, function ($mail) use ($message) {
            $mail->to($message->email)
                 ->subject("Response to: {$message->subject}");
        });

        return redirect()->route('admin.contacts.show', $id)
                         ->with('success', 'Response sent successfully.');
    }
}
