<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for setting a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting(Request $request)
    {
        $user = Auth::user();
        if ($user->profile == null) {
            $profile = Profile::create([
                'user_id' => Auth::user()->id,
                'gender' => 'Male',
                'address' => 'Egypt',
                'facebook_url' => 'https://www.facebook.com/username',
                'linkedin_url' => 'https://www.linkedin.com/in/username',
                'bio' => 'Your About'
            ]);
        }
        return view('users.setting', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        // dd($request->password);
        // Validate data
        $request->validate([
            'name' => 'required|min:4|max:40',
            'email' => 'required',
            'gender' => 'nullable',
            'address' => 'nullable',
            'bio' => 'nullable',
            'facebook_url' => 'nullable',
            'facebook_url' => 'nullable',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->gender = $request->gender;
        $user->profile->address = $request->address;
        $user->profile->bio = $request->bio;
        $user->profile->facebook_url = $request->facebook_url;
        $user->profile->linkedin_url = $request->linkedin_url;
        // Save in user table
        $user->save();
        // Save in profile table
        $user->profile->save();
        // if request has a password
        if ($request->has('password') && $request->password != null) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect()->back()->with('success', 'Updated');
    }
}
