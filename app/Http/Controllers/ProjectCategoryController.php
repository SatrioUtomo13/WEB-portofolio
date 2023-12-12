<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::query(); //create query builder

        /* 
        * check user request
        * create var keyword
        * search name like $keyword
        */
        if (request('keyword')) {
            $keyword = request('keyword');
            $categories->where('name', 'like', "%$keyword%");
        }

        $categories = $categories->get(); //get query builder

        return view('dashboard.projects.category.index', [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:project_categories']
        ]);

        ProjectCategory::create($validatedData);

        return redirect('/dashboard/projectCategories')->with('success', 'New Category has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory)
    {
        return view('dashboard.projects.category.edit', [
            "category" => $projectCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:project_categories']
        ]);

        ProjectCategory::where('id', $projectCategory->id)->update($validatedData);

        return redirect('/dashboard/projectCategories')->with('success', 'Category has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        ProjectCategory::destroy($projectCategory->id); // delete data

        return redirect('/dashboard/projectCategories/')->with('success', 'Category has been Deleted');
    }
}
