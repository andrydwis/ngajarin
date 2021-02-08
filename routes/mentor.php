<?php

use App\Http\Controllers\Mentor\ClassroomController;
use App\Http\Controllers\Mentor\ClassroomCourseController;
use App\Http\Controllers\Mentor\ClassroomMemberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:mentor'])->group(function () {
    Route::get('/mentor/classroom', [ClassroomController::class, 'index'])->name('mentor.classroom.index');
    Route::get('/mentor/classroom/create', [ClassroomController::class, 'create'])->name('mentor.classroom.create');
    Route::post('/mentor/classroom/create', [ClassroomController::class, 'store'])->name('mentor.classroom.store');
    Route::get('/mentor/classroom/edit/{classroom}', [ClassroomController::class, 'edit'])->name('mentor.classroom.edit');
    Route::patch('/mentor/classroom/edit/{classroom}', [ClassroomController::class, 'update'])->name('mentor.classroom.update');
    Route::delete('/mentor/classroom/delete/{classroom}', [ClassroomController::class, 'destroy'])->name('mentor.classroom.destroy');

    Route::get('mentor/classroom/member/{classroom}', [ClassroomMemberController::class, 'index'])->name('mentor.classroom-member.index');
    Route::delete('mentor/classroom/member/{classroom}/{classroomMember}/destroy', [ClassroomMemberController::class, 'destroy'])->name('mentor.classroom-member.destroy');

    Route::get('/mentor/classroom/courses/{classroom}', [ClassroomCourseController::class, 'index'])->name('mentor.classroom-course.index');
    Route::post('/mentor/classroom/courses/{classroom}', [ClassroomCourseController::class, 'store'])->name('mentor.classroom-course.store');
    Route::delete('/mentor/classroom/courses/{classroom}', [ClassroomCourseController::class, 'destroy'])->name('mentor.classroom-course.destroy');
});
