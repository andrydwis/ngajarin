<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/post', [PostController::class, 'index'])->name('user.post.index');
    Route::get('/user/post/create', [PostController::class, 'create'])->name('user.post.create');
    Route::post('/user/post/create', [PostController::class, 'create'])->name('user.post.store');
    Route::get('/user/post/show/{post:slug}', [PostController::class, 'show'])->name('user.post.show');

    Route::post('/user/post/like/{post:slug}', [PostController::class, 'like'])->name('user.post.like');
    Route::post('/user/post/dislike/{post:slug}', [PostController::class, 'dislike'])->name('user.post.dislike');
});
