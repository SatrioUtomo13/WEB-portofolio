<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query(); //create query builder

        /* 
        * check user request
        * create var keyword
        * search title like $keyword
        */
        if (request('keyword')) {
            $keyword = request('keyword');
            $posts->where('title', 'like',  "%$keyword%");
        }

        $posts = $posts->get(); //get query builder

        return view('dashboard.posts.index', [
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            "categories" => PostCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Validated data */
        $validatedData = $request->validate([
            "postcategory_id" => ['required'],
            "title" => ['required', 'min:3', 'max:255'],
            "body" => ['required']
        ]);

        Post::create($validatedData); //store data to Post

        return redirect('/dashboard/post')->with('success', 'New Post has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            "post" => $post,
            "categories" => PostCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        /* Validated data */
        $validatedData = $request->validate([
            "postcategory_id" => ['required'],
            "title" => ['required', 'min:3', 'max:255'],
            "body" => ['required']
        ]);

        Post::where('id', $post->id)->update($validatedData); //update data

        return redirect('dashboard/post')->with('success', 'Post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id); // delete data

        return redirect('/dashboard/post/')->with('success', 'Post has been Deleted');
    }
}
