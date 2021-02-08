<?php

use App\Http\Controllers\Student\ClassroomController;
use App\Http\Controllers\Student\ClassroomMemberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/student/classroom', [ClassroomController::class, 'index'])->name('student.classroom.index');

    Route::get('/student/classroom/member/{classroom}', [ClassroomMemberController::class, 'index'])->name('student.classroom-member.index');
    Route::post('/student/classroom/member', [ClassroomMemberController::class, 'store'])->name('student.classroom-member.store');
    Route::delete('/student/classroom/member/destroy/{classroomMember}', [ClassroomMemberController::class, 'destroy'])->name('student.classroom-member.destroy');
});
