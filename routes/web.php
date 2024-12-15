<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ShowController;
use App\Livewire\Posts\{Show,Create,Edit,Details};
use App\Livewire\Categories\{Create as CreateCategory, Show as ShowCategory, Edit as EditCategory};
use App\Livewire\Dashboard;

Route::get('/', ShowController::class)->name('blog');
Route::get('/posts', Show::class)->name('posts.index');
Route::get('/posts/{id}/details', Details::class)->name('posts.details');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/posts/create', Create::class)->name('posts.create');
    Route::get('/dashboard/posts/{id}/edit', Edit::class)->name('posts.edit');

    Route::get('/dashboard/categories/create', CreateCategory::class)->name('categories.create');
    Route::get('/dashboard/categories', ShowCategory::class)->name('categories.show');
    Route::get('/dashboard/categories/{id}/edit', EditCategory::class)->name('categories.edit');
});
