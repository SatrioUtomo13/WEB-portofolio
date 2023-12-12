<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query(); //create query builder

        /* 
        * check user request
        * create var keyword
        * search name like $keyword
        */
        if (request('keyword')) {
            $keyword = request('keyword');
            $projects->where('name', 'like', "%$keyword%")
                ->orWhere('technology', 'like', "%$keyword%");
        }

        $projects = $projects->get(); //get query builder

        return view('dashboard.projects.index', [
            "projects" => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create', [
            "categories" => ProjectCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "projectcategory_id" => ['required'],
            "name" => ['required'],
            "technology" => ['required'],
            "shoot_cover" => ['required', 'image'],
            "img_1" => ['nullable', 'image'],
            "img_2" => ['nullable', 'image'],
            "description" => ['required', 'max:255']
        ]);

        $imgPath = 'project-images';

        // upload shoot_cover to project-images folder
        $validatedData['shoot_cover'] = $request->file('shoot_cover')->store($imgPath);

        // upload img_1 jika ada
        $request->file('img_1') ? $validatedData['img_1'] = $request->file('img_1')->store($imgPath) : '';

        // upload img_2 jika ada
        $request->file('img_2') ? $validatedData['img_2'] = $request->file('img_2')->store($imgPath) : '';

        Project::create($validatedData);

        return redirect('/dashboard/project')->with('success', 'New Project has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
