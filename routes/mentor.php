<?php

use App\Http\Controllers\Mentor\ClassroomController;
use App\Http\Controllers\Mentor\ClassroomCourseController;
use App\Http\Controllers\Mentor\ClassroomMemberController;
use App\Http\Controllers\Mentor\CourseController;
use App\Http\Controllers\Mentor\EpisodeController;
use App\Http\Controllers\Mentor\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:mentor'])->group(function () {
    Route::get('/mentor/course', [CourseController::class, 'index'])->name('mentor.course.index');
    Route::get('/mentor/course/create', [CourseController::class, 'create'])->name('mentor.course.create');
    Route::post('/mentor/course/create', [CourseController::class, 'store'])->name('mentor.course.store');
    Route::get('/mentor/course/show/{course:slug}', [CourseController::class, 'show'])->name('mentor.course.show');
    Route::get('/mentor/course/edit/{course:slug}', [CourseController::class, 'edit'])->name('mentor.course.edit');
    Route::patch('/mentor/course/edit/{course:slug}', [CourseController::class, 'update'])->name('mentor.course.update');
    Route::delete('/mentor/course/destroy/{course:slug}', [CourseController::class, 'destroy'])->name('mentor.course.destroy');

    Route::get('/mentor/course/{course:slug}/episode', [EpisodeController::class, 'index'])->name('mentor.course.episode.index');
    Route::get('/mentor/course/{course:slug}/episode/create', [EpisodeController::class, 'create'])->name('mentor.course.episode.create');
    Route::post('/mentor/course/{course:slug}/episode/create', [EpisodeController::class, 'store'])->name('mentor.course.episode.store');
    Route::get('/mentor/course/{course:slug}/episode/show/{episode:slug}', [EpisodeController::class, 'show'])->name('mentor.course.episode.show');
    Route::get('/mentor/course/{course:slug}/episode/edit/{episode:slug}', [EpisodeController::class, 'edit'])->name('mentor.course.episode.edit');
    Route::patch('/mentor/course/{course:slug}/episode/edit/{episode:slug}', [EpisodeController::class, 'update'])->name('mentor.course.episode.update');
    Route::delete('/mentor/course/{course:slug}/episode/destroy/{episode:slug}', [EpisodeController::class, 'destroy'])->name('mentor.course.episode.destroy');

    Route::get('/mentor/course/{course:slug}/submission', [SubmissionController::class, 'index'])->name('mentor.course.submission.index');
    Route::get('/mentor/course/{course:slug}/submission/create', [SubmissionController::class, 'create'])->name('mentor.course.submission.create');
    Route::post('/mentor/course/{course:slug}/submission/create', [SubmissionController::class, 'store'])->name('mentor.course.submission.store');
    Route::get('/mentor/course/{course:slug}/submission/show/{submission}', [SubmissionController::class, 'show'])->name('mentor.course.submission.show');
    Route::get('/mentor/course/{course:slug}/submission/edit/{submission}', [SubmissionController::class, 'edit'])->name('mentor.course.submission.edit');
    Route::patch('/mentor/course/{course:slug}/submission/edit/{submission}', [SubmissionController::class, 'update'])->name('mentor.course.submission.update');
    Route::delete('/mentor/course/{course:slug}/submission/destroy/{submission}', [SubmissionController::class, 'destroy'])->name('mentor.course.submission.destroy');

    Route::get('/mentor/classroom', [ClassroomController::class, 'index'])->name('mentor.classroom.index');
    Route::get('/mentor/classroom/create', [ClassroomController::class, 'create'])->name('mentor.classroom.create');
    Route::post('/mentor/classroom/create', [ClassroomController::class, 'store'])->name('mentor.classroom.store');
    Route::get('/mentor/classroom/edit/{classroom}', [ClassroomController::class, 'edit'])->middleware(['verify_class'])->name('mentor.classroom.edit');
    Route::patch('/mentor/classroom/edit/{classroom}', [ClassroomController::class, 'update'])->middleware(['verify_class'])->name('mentor.classroom.update');
    Route::delete('/mentor/classroom/destroy/{classroom}', [ClassroomController::class, 'destroy'])->middleware(['verify_class'])->name('mentor.classroom.destroy');

    Route::get('/mentor/classroom/{classroom}/member', [ClassroomMemberController::class, 'index'])->middleware(['verify_class'])->name('mentor.classroom-member.index');
    Route::delete('/mentor/classroom/{classroom}/member/destroy/{classroomMember}', [ClassroomMemberController::class, 'destroy'])->middleware(['verify_class'])->name('mentor.classroom-member.destroy');

    Route::get('/mentor/classroom/{classroom}/courses', [ClassroomCourseController::class, 'index'])->middleware(['verify_class'])->name('mentor.classroom-course.index');
    Route::post('/mentor/classroom/{classroom}/courses/create', [ClassroomCourseController::class, 'store'])->middleware(['verify_class'])->name('mentor.classroom-course.store');
    Route::delete('/mentor/classroom/{classroom}/courses/destroy', [ClassroomCourseController::class, 'destroy'])->middleware(['verify_class'])->name('mentor.classroom-course.destroy');
});
