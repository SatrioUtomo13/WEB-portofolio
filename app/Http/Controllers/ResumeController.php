<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.resume.index', [
            "resume" => Resume::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.resume.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation image
        $validatedData = $request->validate([
            "image" => ['required', 'file']
        ]);

        $imgPath = 'resume-images'; // path resume image

        $validatedData["image"] = $request->file("image")->store($imgPath); // store image

        Resume::create($validatedData); // create data to Resume model

        return redirect('/dashboard/resume')->with('success', 'New CV has been Added'); // redirect user 
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        return view('dashboard.resume.edit', [
            "resume" => $resume
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        // data validation
        $validatedData = $request->validate([
            "image" => ['required', 'file']
        ]);

        $imgPath = 'resume-images'; // create path image

        Storage::delete($request->oldImage); // delete previous image

        $validatedData["image"] = $request->file('image')->store($imgPath); // store image 

        Resume::where('id', $resume->id)->update($validatedData); // update data

        return redirect('/dashboard/resume')->with('success', 'Resume has been Updated'); // redirect user
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        /* 
            if there is an image, delete image from the storage
        */
        if ($resume->image) {
            Storage::delete($resume->image);
        }

        Resume::destroy($resume->id); // delete data from Resume model

        return redirect('/dashboard/resume')->with('success', 'Resume has been deleted'); // redirect user
    }
}
