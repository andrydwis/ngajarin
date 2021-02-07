<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/mentor-list', [MentorController::class, 'index'])->name('admin.mentor-list.index');
    Route::get('/admin/mentor-list/create', [MentorController::class, 'create'])->name('admin.mentor-list.create');
    Route::post('/admin/mentor-list/create', [MentorController::class, 'store'])->name('admin.mentor-list.store');

    Route::get('/admin/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course/create', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/admin/course/edit/{course}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::patch('/admin/course/edit/{course}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/admin/course/destroy/{course}', [CourseController::class, 'destroy'])->name('admin.course.destroy');

    Route::get('/admin/tag', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/admin/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/admin/tag/create', [TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/admin/tag/edit/{tag}', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::patch('/admin/tag/edit/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/admin/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
});
