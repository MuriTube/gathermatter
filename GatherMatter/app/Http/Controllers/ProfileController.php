<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name' => 'required|max:255|unique:users,name,' . Auth::id(),
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'telefon' => 'nullable|max:255',
            'zip' => 'required|max:10',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $user = Auth::user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.index')->with('status', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.@$!%*#?&]).+$/',
            ],
        ], [
            'new_password.regex' => 'The password must contain at least 8 characters, one uppercase letter, one digit, and one special character [.@$!%*#?&]',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            $validator->errors()->add('old_password', 'The old password is incorrect!');
            return redirect()->back()->withErrors($validator);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('status', 'Password successfully updated');
    }


}
