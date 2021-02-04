<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');