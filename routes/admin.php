<?php

use App\Http\Controllers\Admin\CertificateController;
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
    Route::get('/admin/course/show/{course:slug}', [CourseController::class, 'show'])->name('admin.course.show');
    Route::get('/admin/course/edit/{course:slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::patch('/admin/course/edit/{course:slug}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/admin/course/destroy/{course:slug}', [CourseController::class, 'destroy'])->name('admin.course.destroy');

    Route::get('/admin/course/{course:slug}/episode', [EpisodeController::class, 'index'])->name('admin.course.episode.index');
    Route::get('/admin/course/{course:slug}/episode/create', [EpisodeController::class, 'create'])->name('admin.course.episode.create');
    Route::post('/admin/course/{course:slug}/episode/create', [EpisodeController::class, 'store'])->name('admin.course.episode.store');
    Route::get('/admin/course/{course:slug}/episode/show/{episode:slug}', [EpisodeController::class, 'show'])->name('admin.course.episode.show');
    Route::get('/admin/course/{course:slug}/episode/edit/{episode:slug}', [EpisodeController::class, 'edit'])->name('admin.course.episode.edit');
    Route::patch('/admin/course/{course:slug}/episode/edit/{episode:slug}', [EpisodeController::class, 'update'])->name('admin.course.episode.update');
    Route::delete('/admin/course/{course:slug}/episode/destroy/{episode:slug}', [EpisodeController::class, 'destroy'])->name('admin.course.episode.destroy');

    Route::get('/admin/course/{course:slug}/submission', [SubmissionController::class, 'index'])->name('admin.course.submission.index');
    Route::get('/admin/course/{course:slug}/submission/create', [SubmissionController::class, 'create'])->name('admin.course.submission.create');
    Route::post('/admin/course/{course:slug}/submission/create', [SubmissionController::class, 'store'])->name('admin.course.submission.store');
    Route::get('/admin/course/{course:slug}/submission/show/{submission:slug}', [SubmissionController::class, 'show'])->name('admin.course.submission.show');
    Route::get('/admin/course/{course:slug}/submission/edit/{submission:slug}', [SubmissionController::class, 'edit'])->name('admin.course.submission.edit');
    Route::patch('/admin/course/{course:slug}/submission/edit/{submission:slug}', [SubmissionController::class, 'update'])->name('admin.course.submission.update');
    Route::delete('/admin/course/{course:slug}/submission/destroy/{submission:slug}', [SubmissionController::class, 'destroy'])->name('admin.course.submission.destroy');

    Route::get('/admin/course/{course:slug}/submission/review/{submission:slug}', [SubmissionController::class, 'review'])->name('admin.course.submission.review');
    Route::get('/admin/course/{course:slug}/submission/review-pending/{submission:slug}', [SubmissionController::class, 'reviewPending'])->name('admin.course.submission.review-pending');
    Route::get('/admin/course/{course:slug}/submission/review-accepted/{submission:slug}', [SubmissionController::class, 'reviewAccepted'])->name('admin.course.submission.review-accepted');
    Route::get('/admin/course/{course:slug}/submission/review-rejected/{submission:slug}', [SubmissionController::class, 'reviewRejected'])->name('admin.course.submission.review-rejected');
    Route::post('/admin/course/{course:slug}/submission/review-process/{submission:slug}/{submissionUser}', [SubmissionController::class, 'reviewProcess'])->name('admin.course.submission.review-process');

    Route::get('/admin/course/{course:slug}/certificate', [CertificateController::class, 'index'])->name('admin.course.certificate.index');
    Route::get('/admin/course/{course:slug}/certificate/create', [CertificateController::class, 'create'])->name('admin.course.certificate.create');
    Route::post('/admin/course/{course:slug}/certificate/create', [CertificateController::class, 'store'])->name('admin.course.certificate.store');
    Route::get('/admin/course/{course:slug}/certificate/show/{certificate}', [CertificateController::class, 'show'])->name('admin.course.certificate.show');
    Route::get('/admin/course/{course:slug}/certificate/edit/{certificate}', [CertificateController::class, 'edit'])->name('admin.course.certificate.edit');
    Route::patch('/admin/course/{course:slug}/certificate/edit/{certificate}', [CertificateController::class, 'update'])->name('admin.course.certificate.update');
    Route::delete('/admin/course/{course:slug}/certificate/destroy/{certificate}', [CertificateController::class, 'destroy'])->name('admin.course.certificate.destroy');
});
