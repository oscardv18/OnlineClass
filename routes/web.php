<?php

use Illuminate\Http\Request;

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts\AdminPost;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Institutes\SearchInstitute;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage.index');
})->name('home');

Route::get('/blog', function () {
    return view('landingpage.blog');
})->name('blog');

Route::get('/blog-single', function () {
    return view('landingpage.blog-single');
})->name('blog-single');

Route::get('/inner-page', function () {
    return view('landingpage.inner-page');
})->name('inner-page');

Route::get('/portfolio-details', function () {
    return view('landingpage.portfolio-details');
})->name('portfolio');

Route::get('/search-institute', function () {
    return view('components.institutes.view-all');
})->name('search');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::domain('{account}.' . env('APP_URL'))->group(function () {
        Route::name('institute.')->group(function ($account) {
            Route::get('/dashboard', Dashboard::class)->name('inst-dash');
        });
    });

    # Principal Route
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    # Post Routes
    Route::resource('/dashboard/posts', PostController::class);
    Route::get('dashboard/admin-posts', AdminPost::class)->name('admin-posts');
});
