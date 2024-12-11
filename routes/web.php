<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ShowController;
use App\Livewire\Posts\{Show,Create};

Route::get('/', ShowController::class)->name('blog');
Route::get('/posts', Show::class)->name('posts.index');
Route::get('/dashboard/posts/create', Create::class)->name('posts.create');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
