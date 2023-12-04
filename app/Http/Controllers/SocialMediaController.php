<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.socialMedia.index', [
            "socialMedias" => SocialMedia::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.socialMedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => ['required', 'unique:social_media'],
            "address" => ['required', 'unique:social_media']
        ]);

        SocialMedia::create($validatedData);

        return redirect('/dashboard/socialmedia')->with('success', 'New Social Media has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $socialmedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialmedia)
    {
        return view('dashboard.socialMedia.edit', [
            "media" => $socialmedia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $socialmedia)
    {
        $validatedData = $request->validate([
            "title" => ['required',],
            "address" => ['required',]
        ]);

        SocialMedia::where('id', $socialmedia->id)->update($validatedData);

        return redirect('/dashboard/socialmedia')->with('success', 'Social Media has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialmedia)
    {

        SocialMedia::destroy($socialmedia->id);

        return redirect('/dashboard/socialmedia')->with('success', 'Social Media has been Deleted');
    }
}
