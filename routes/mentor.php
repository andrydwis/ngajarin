<?php

use App\Http\Controllers\Mentor\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:mentor'])->group(function () {
    Route::get('/mentor/classroom', [ClassroomController::class, 'index'])->name('mentor.classroom.index');
});
