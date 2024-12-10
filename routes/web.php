<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ShowController;

Route::get('/', ShowController::class)->name('blog');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
