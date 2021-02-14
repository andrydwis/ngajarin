<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/mentor-list', [MentorController::class, 'index'])->name('admin.mentor-list.index');
    Route::get('/admin/mentor-list/create', [MentorController::class, 'create'])->name('admin.mentor-list.create');
    Route::post('/admin/mentor-list/create', [MentorController::class, 'store'])->name('admin.mentor-list.store');

    Route::get('/admin/tag', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/admin/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/admin/tag/create', [TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/admin/tag/edit/{tag}', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::patch('/admin/tag/edit/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/admin/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('admin.tag.destroy');

    Route::get('/admin/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course/create', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/admin/course/edit/{course:slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::patch('/admin/course/edit/{course:slug}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/admin/course/destroy/{course:slug}', [CourseController::class, 'destroy'])->name('admin.course.destroy');

    Route::get('/admin/course/episode/{course:slug}', [EpisodeController::class, 'index'])->name('admin.course.episode.index');
    Route::get('/admin/course/episode/create/{course:slug}', [EpisodeController::class, 'create'])->name('admin.course.episode.create');
    Route::post('/admin/course/episode/create/{course:slug}', [EpisodeController::class, 'store'])->name('admin.course.episode.store');
    Route::get('/admin/course/episode/show/{course:slug}/{episode:slug}', [EpisodeController::class, 'show'])->name('admin.course.episode.show');
    Route::get('/admin/course/episode/edit/{course:slug}/{episode:slug}', [EpisodeController::class, 'edit'])->name('admin.course.episode.edit');
    Route::patch('/admin/course/episode/edit/{course:slug}/{episode:slug}', [EpisodeController::class, 'update'])->name('admin.course.episode.update');
    Route::delete('/admin/course/episode/destroy/{course:slug}/{episode:slug}', [EpisodeController::class, 'destroy'])->name('admin.course.episode.destroy');

    Route::get('/admin/course/submission/{course:slug}', [SubmissionController::class, 'index'])->name('admin.course.submission.index');
    Route::get('/admin/course/submission/create/{course:slug}', [SubmissionController::class, 'create'])->name('admin.course.submission.create');
    Route::post('/admin/course/submission/create/{course:slug}', [SubmissionController::class, 'store'])->name('admin.course.submission.store');
    Route::get('/admin/course/submission/show/{course:slug}/{submission}', [SubmissionController::class, 'show'])->name('admin.course.submission.show');
    Route::get('/admin/course/submission/edit/{course:slug}/{submission}', [SubmissionController::class, 'edit'])->name('admin.course.submission.edit');
    Route::patch('/admin/course/submission/edit/{course:slug}/{submission}', [SubmissionController::class, 'update'])->name('admin.course.submission.update');
    Route::delete('/admin/course/submission/destroy/{course:slug}/{submission}', [SubmissionController::class, 'destroy'])->name('admin.course.submission.destroy');
});
