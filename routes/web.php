<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DoneTaskController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/chapters', ChapterController::class);
Route::get('/chapters/createView/{course}', [ChapterController::class, 'createView'])->name('chapters.createView');


Route::resource('/courses', CourseController::class);
Route::get('/courses/{course}/showUsers', [CourseController::class, 'showUsers'])->name('courses.showUsers');

Route::resource('/course_users', CourseUserController::class);
Route::patch('/course_users/{course_user}/update-activity', [CourseUserController::class, 'updateActivity'])->name('course_users.updateActivity');
Route::patch('/course_users/{course_user}/update-completed', [CourseUserController::class, 'updateCompleted'])->name('course_users.updateCompleted');


Route::resource('/questions', QuestionController::class);
Route::get('/questions/createView/{chapter}', [QuestionController::class, 'createView'])->name('questions.createView');

Route::resource('/schools', SchoolController::class);

Route::resource('/types', TypeController::class);

Route::resource('/users', UserController::class);
Route::patch('/users/{user}/updateActivity', [UserController::class, 'updateActivity'])->name('users.updateActivity');

Route::resource('/done_tasks', DoneTaskController::class);
