<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication (login) request (WEB).
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        // ✅ Use credentials array for cleaner Auth::attempt
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            return back()->withErrors([
                'email' => 'Invalid login details',
            ]);
        }

        $request->session()->regenerate();

        // ✅ Redirect based on role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Admin → /admin
        }

        return redirect()->intended('/home'); // Normal user → /home
    }

    /**
     * Destroy an authenticated session (logout).
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // redirect to login page
    }
}
