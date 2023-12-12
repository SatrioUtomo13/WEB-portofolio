<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* === LANDING PAGE === */

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/detail/{project:id}', [LandingPageController::class, 'show']);
Route::get('/detailPost/{post:id}', [LandingPageController::class, 'showPost']);
Route::get('/download', [LandingPageController::class, 'downloadImage'])->name('downloadImage');

/* === LOGIN === */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/* === DASHBOARD === */
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

/* === PROFILE === */
Route::resource('/dashboard/user', ProfileController::class);

/* === PROJECT === */
Route::resource('/dashboard/project', ProjectController::class);
Route::resource('/dashboard/projectCategories', ProjectCategoryController::class)->except('show');

/* === POSTS === */
Route::resource('/dashboard/post', PostController::class);
Route::resource('/dashboard/postCategories', PostCategoryController::class);

/* === CV === */
Route::resource('/dashboard/resume', ResumeController::class);

/* === SKILL === */
Route::resource('/dashboard/skill', SkillController::class);

/* === SoCIAL MEDIA === */
Route::resource('/dashboard/socialmedia', SocialMediaController::class);
