<?php

use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\VerifyCertificateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', RootController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard.admin');
Route::get('/mentor/dashboard', [DashboardController::class, 'mentor'])->middleware(['auth', 'verified', 'role:mentor'])->name('dashboard.mentor');
Route::get('/student/dashboard', [DashboardController::class, 'student'])->middleware(['auth', 'verified', 'role:student'])->name('dashboard.student');

Route::get('/verify-certificate', [VerifyCertificateController::class, 'index'])->name('verify-certificate.index');
Route::post('/verify-certificate', [VerifyCertificateController::class, 'store'])->name('verify-certificate.store');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/mentor.php';
require __DIR__ . '/student.php';
require __DIR__ . '/user.php';


