<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users=User::all();
        return view('dashboard',compact('users'));
    })->name('dashboard');

});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    //student
Route::get('/student/all',[StudentController::class,'index'])->name('student');
Route::post('/student/add',[StudentController::class,'store'])->name('addStudent');
Route::get('/student/edit/{id}',[StudentController::class,'edit']);
Route::post('/student/update/{id}',[StudentController::class,'update']);
Route::get('/student/delete/{id}',[StudentController::class,'delete']);
});