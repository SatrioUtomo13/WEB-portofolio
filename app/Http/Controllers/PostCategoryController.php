<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::query(); //create query builder

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

        return view('dashboard.posts.category.index', [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:post_categories']
        ]);

        PostCategory::create($validatedData);

        return redirect('/dashboard/postCategories')->with('success', 'New Category has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        return view('dashboard.posts.category.edit', [
            "category" => $postCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        $validatedData = $request->validate([
            "name" => ['required', 'unique:post_categories']
        ]);

        PostCategory::where('id', $postCategory->id)->update($validatedData);

        return redirect('/dashboard/postCategories')->with('success', 'Category has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        PostCategory::destroy($postCategory->id); // delete data

        return redirect('/dashboard/postCategories/')->with('success', 'Category has been Deleted');
    }
}
