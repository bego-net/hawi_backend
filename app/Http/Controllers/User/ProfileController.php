<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
         /** @var \App\Models\User $user */
    $user = Auth::user();

        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'phone'      => 'nullable|string|max:20',
            'company'    => 'nullable|string|max:255',
            'password'   => 'nullable|confirmed|min:6',
            'profile_pic'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $filename = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads/profile_pics'), $filename);
            $user->profile_pic = 'uploads/profile_pics/' . $filename;
        }

        // Update basic info
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->company = $request->company;

        // Update password only if entered
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
