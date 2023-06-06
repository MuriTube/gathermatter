<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'telefon' => 'nullable|max:255',
            'zip' => 'required|max:10',
            'city' => 'required|max:255',
        ]);

        $user = Auth::user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.index')->with('status', 'Profil wurde erfolgreich aktualisiert!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile.index')->with('error', 'Das alte Passwort ist nicht korrekt.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('status', 'Passwort wurde erfolgreich aktualisiert.');
    }
}
