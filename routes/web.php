<?php

use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DocumentationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentation', [DocumentationController::class, 'code']);

Route::get('/new_dashboard', function () {
    return view('admin.dashboard.index');
});

Route::get('/dashboard', function () {
    // return view('layouts.admin.app');
    return view('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/mentor.php';
require __DIR__ . '/student.php';
