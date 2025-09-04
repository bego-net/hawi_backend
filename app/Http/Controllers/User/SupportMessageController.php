<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SupportMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportMessageController extends Controller
{
    public function index()
    {
        $messages = SupportMessage::where('user_id', Auth::id())->latest()->get();
        return view('user.messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        SupportMessage::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('dashboard.messages.index')->with('success', 'Message sent');
    }
}
