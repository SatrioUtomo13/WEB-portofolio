<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // data validation
        $validatedData = $request->validate(
            [
                "name" => ['required'],
                "profession" => ['required'],
                "email" => ['required', 'email:dns'],
                "image" => ['nullable', 'file'],
                "password" => ['nullable', 'confirmed'],
                "password_confirmation" => ['nullable']
            ]
        );

        $imgPath = 'profile-image'; // image path

        if ($request->file('oldImage')) {
            Storage::delete($request->oldImage); // delete previous image
        }

        if ($request->file('image')) {
            $validatedData["image"] = $request->file('image')->store($imgPath); // store image
        }

        unset($validatedData["password_confirmation"]); // hapus password confirmation

        // bcrypt($validatedData["password"]);
        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::where('id', $user->id)->update($validatedData); // update data

        return redirect('/dashboard/user')->with('success', 'Profile has been Updated'); // redirect users
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
