<?php

use App\Http\Controllers\Mentor\ClassroomController;
use App\Http\Controllers\Mentor\ClassroomCourseController;
use App\Http\Controllers\Mentor\ClassroomMemberController;
use App\Http\Controllers\Mentor\CourseController;
use App\Http\Controllers\Mentor\EpisodeController;
use App\Http\Controllers\Mentor\ScheduleController;
use App\Http\Controllers\Mentor\ScoreController;
use App\Http\Controllers\Mentor\SubmissionController;
use App\Http\Controllers\Mentor\TutoringController;
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
    Route::get('/mentor/course/{course:slug}/submission/show/{submission:slug}', [SubmissionController::class, 'show'])->name('mentor.course.submission.show');
    Route::get('/mentor/course/{course:slug}/submission/edit/{submission:slug}', [SubmissionController::class, 'edit'])->name('mentor.course.submission.edit');
    Route::patch('/mentor/course/{course:slug}/submission/edit/{submission:slug}', [SubmissionController::class, 'update'])->name('mentor.course.submission.update');
    Route::delete('/mentor/course/{course:slug}/submission/destroy/{submission:slug}', [SubmissionController::class, 'destroy'])->name('mentor.course.submission.destroy');

    Route::get('/mentor/course/{course:slug}/submission/review/{submission:slug}', [SubmissionController::class, 'review'])->name('mentor.course.submission.review');
    Route::get('/mentor/course/{course:slug}/submission/review-pending/{submission:slug}', [SubmissionController::class, 'reviewPending'])->name('mentor.course.submission.review-pending');
    Route::get('/mentor/course/{course:slug}/submission/review-accepted/{submission:slug}', [SubmissionController::class, 'reviewAccepted'])->name('mentor.course.submission.review-accepted');
    Route::get('/mentor/course/{course:slug}/submission/review-rejected/{submission:slug}', [SubmissionController::class, 'reviewRejected'])->name('mentor.course.submission.review-rejected');
    Route::post('/mentor/course/{course:slug}/submission/review-process/{submission:slug}/{submissionUser}', [SubmissionController::class, 'reviewProcess'])->name('mentor.course.submission.review-process');

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

    Route::get('/mentor/course/{course:slug}/score', [ScoreController::class, 'index'])->name('mentor.course.score.index');
    Route::get('/mentor/course/{course:slug}/score/user/{user}', [ScoreController::class, 'show'])->name('mentor.course.score.show');

    Route::get('/mentor/schedule', [ScheduleController::class, 'index'])->name('mentor.schedule.index');
    Route::get('/mentor/schedule/create', [ScheduleController::class, 'create'])->name('mentor.schedule.create');
    Route::post('/mentor/schedule/create', [ScheduleController::class, 'store'])->name('mentor.schedule.store');
    Route::get('/mentor/schedule/edit/{schedule}', [ScheduleController::class, 'edit'])->name('mentor.schedule.edit');
    Route::patch('/mentor/schedule/edit/{schedule}', [ScheduleController::class, 'update'])->name('mentor.schedule.update');
    Route::delete('/mentor/schedule/destroy/{schedule}', [ScheduleController::class, 'destroy'])->name('mentor.schedule.destroy');

    Route::get('/mentor/tutoring', [TutoringController::class, 'index'])->name('mentor.tutoring.index');
    Route::get('/mentor/tutoring/show/{tutoring}', [TutoringController::class, 'show'])->name('mentor.tutoring.show');
    Route::patch('/mentor/tutoring/edit/{tutoring}', [TutoringController::class, 'update'])->name('mentor.tutoring.update');
});
