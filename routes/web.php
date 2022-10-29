<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\TimetableController;
use App\Http\Controllers\Teacher\TimetableController as TeacherTimeTableController;
use App\Http\Controllers\Admin\UsersController;
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

Route::middleware(['auth','verified'])->group(function(){
    
    //STUDENT
    Route::middleware('role:1')
    ->prefix('student')
    ->name('student.')
    ->group(function(){
        Route::get('timetable', [TimetableController::class,'index'])
        ->name('timetable');
    });

    //TEACH
    Route::middleware('role:2')
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function(){
        Route::get('timetable', [TeacherTimetableController::class,'index'])
        ->name('timetable');
    });

    //ADMIN
    Route::middleware('role:3')
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::get('users', [UsersController::class,'index'])
        ->name('users');
    });
});

require __DIR__.'/auth.php';

