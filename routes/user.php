<?php

use App\Http\Controllers\User\ReplyController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ConversationController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\UserDetailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/profile', [UserDetailController::class, 'show'])->name('user.profile.show');
    Route::get('/user/profile/edit', [UserDetailController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/user/profile/edit', [UserDetailController::class, 'update'])->name('user.profile.update');

    Route::get('/user/post', [PostController::class, 'index'])->name('user.post.index');
    Route::get('/user/post/create', [PostController::class, 'create'])->name('user.post.create');
    Route::post('/user/post/create', [PostController::class, 'store'])->name('user.post.store');
    Route::get('/user/post/show/{post:slug}', [PostController::class, 'show'])->name('user.post.show');
    Route::get('/user/post/edit/{post:slug}', [PostController::class, 'edit'])->name('user.post.edit');
    Route::patch('/user/post/edit/{post:slug}', [PostController::class, 'update'])->name('user.post.update');
    Route::delete('/user/post/destroy/{post:slug}', [PostController::class, 'destroy'])->name('user.post.destroy');
    Route::get('/user/post/my-post', [PostController::class, 'myPost'])->name('user.post.my-post');
    Route::get('/user/post/bookmark/', [PostController::class, 'bookmark'])->name('user.post.bookmark');
    Route::post('/user/post/bookmark/{post}', [PostController::class, 'bookmarkProcess'])->name('user.post.bookmark-process');
    Route::post('/user/post/search', [PostController::class, 'search'])->name('user.post.search');

    Route::post('/user/post/like/{post:slug}', [PostController::class, 'like'])->name('user.post.like');
    Route::post('/user/post/dislike/{post:slug}', [PostController::class, 'dislike'])->name('user.post.dislike');

    Route::post('/user/post/comment/store/{post:slug}', [CommentController::class, 'store'])->name('user.post.comment.store');
    Route::delete('/user/post/comment/destroy/{comment}/{post}', [CommentController::class, 'destroy'])->name('user.post.comment.destroy');
    Route::post('/user/post/comment/like/{comment}', [CommentController::class, 'like'])->name('user.post.comment.like');
    Route::post('/user/post/comment/dislike/{comment}', [CommentController::class, 'dislike'])->name('user.post.comment.dislike');

    Route::get('/user/chat', [ConversationController::class, 'index'])->name('user.chat.index');
    Route::get('/user/chat/{conversation}', [ConversationController::class, 'show'])->name('user.chat.show');
    Route::post('/user/chat/{conversation}', [ReplyController::class, 'store'])->name('user.chat.store');
});
