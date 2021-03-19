<?php

use App\Http\Controllers\Student\SubmissionUserController;
use App\Http\Controllers\Student\CourseUserController;
use App\Http\Controllers\Student\ClassroomController;
use App\Http\Controllers\Student\ClassroomCourseController;
use App\Http\Controllers\Student\ClassroomMemberController;
use App\Http\Controllers\Student\CourseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/student/classroom', [ClassroomController::class, 'index'])->name('student.classroom.index');

    Route::get('/student/classroom/member/{classroom}', [ClassroomMemberController::class, 'index'])->middleware(['verify_class'])->name('student.classroom-member.index');
    Route::post('/student/classroom/member', [ClassroomMemberController::class, 'store'])->name('student.classroom-member.store');
    Route::delete('/student/classroom/member/destroy/{classroomMember}', [ClassroomMemberController::class, 'destroy'])->name('student.classroom-member.destroy');

    Route::get('/student/classroom/courses/{classroom}', [ClassroomCourseController::class, 'index'])->middleware(['verify_class'])->name('student.classroom-course.index');

    Route::get('/student/course', [CourseController::class, 'index'])->name('student.course.index');
    Route::get('/student/course/show/{course:slug}', [CourseController::class, 'show'])->name('student.course.show');
    Route::get('/student/course/{course:slug}/submission/show/{submission:slug}', [SubmissionUserController::class, 'show'])->name('student.course.submission.show');
    Route::post('/student/course/{course:slug}/submission/create/{submission:slug}', [SubmissionUserController::class, 'store'])->name('student.course.submission.store');
    Route::patch('/student/course/{course:slug}/submission/{submission:slug}/submission-user/edit/{submissionUser}', [SubmissionUserController::class, 'update'])->name('student.course.submission.update');
    Route::delete('/student/course/{course:slug}/submission/{submission:slug}/submission-user/destroy/{submissionUser}', [SubmissionUserController::class, 'destroy'])->name('student.course.submission.destroy');

    Route::get('/student/course-list', [CourseUserController::class, 'index'])->name('student.course-list.index');
    Route::post('/student/course-list/create/{course:slug}', [CourseUserController::class, 'store'])->name('student.course-list.store');
});
