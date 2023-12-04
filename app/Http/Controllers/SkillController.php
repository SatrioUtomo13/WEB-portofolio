<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.skills.index', [
            "skills" => Skill::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:skills'],
            "image" => ['required', 'file'],
            "description" => ['required', 'min:100',]
        ]);

        $imgPath = 'skill-images'; // image path

        $validatedData["image"] = $request->file("image")->store($imgPath);

        Skill::create($validatedData); // store data to Skill model

        return redirect('/dashboard/skill')->with('success', 'New Skill has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('dashboard.skills.edit', [
            "skill" => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:skills'],
            "image" => ['required', 'file'],
            "description" => ['required', 'min:100',]
        ]);

        Storage::delete($request->oldImage); //delete old image

        $imgPath = 'skill-images'; // path image skill

        $validatedData["image"] = $request->file('image')->store($imgPath); // store new image

        Skill::where('id', $skill->id)->update($validatedData); // update data

        return redirect('/dashboard/skill')->with('success', 'Skill has been Updated'); // redirect user
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        // if there is image, delete the image
        if ($skill->image) {
            Storage::delete($skill->image);
        }

        Skill::destroy($skill->id); // delete 1 record 

        return redirect('/dashboard/skill')->with('success', 'Skill has been Deleted'); //redirect user
    }
}
