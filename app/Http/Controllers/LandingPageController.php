<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function socialMedia()
    {
        $socialMedia = SocialMedia::whereIn('title', ['instagram', 'email', 'github', 'youtube', 'facebook', 'tiktok'])->get()->keyBy('title');

        return $socialMedia;
    }

    public function index()
    {
        $resume = Resume::get()->pluck('image')->toArray();

        // Social Media
        return view('welcome', [
            "users" => User::all(),
            "projects" => Project::all(),
            "posts" => Post::all(),
            "skills" => Skill::all(),
            "projectCategory" => ProjectCategory::all(),
            "media" => $this->SocialMedia(),
            "resume" => $resume
        ]);
    }

    public function show(Project $project)
    {

        $name = User::pluck('name')->all();

        return view('showProject', [
            "project" => $project,
            "name" => $name
        ]);
    }

    public function showPost(Post $post)
    {
        // $relateCategory = PostCategory::firstWhere('name', request('category'));
        $relateCategory = request('category');

        $relatedPost = Post::whereHas('postcategory', function ($query) use ($relateCategory) {
            $query->where('post_categories.name', $relateCategory);
        })->get();

        $name = User::pluck('name')->all();

        return view('showPost', [
            "name" => $name,
            "media" => $this->socialMedia(),
            "post" => $post,
            "relatedPost" => $relatedPost
        ]);
    }
}
