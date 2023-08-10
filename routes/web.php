<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TeachersController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages/admin/dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

/* Manage Class Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/class/view', [ClassController::class,'view'])->name('class.view');
Route::get('/class/add', [ClassController::class,'add'])->name('class.add');
Route::post('/class/store', [ClassController::class,'store'])->name('class.store');
Route::get('/class/edit/{id}', [ClassController::class,'edit'])->name('class.edit');
Route::post('/class/update/{id}', [ClassController::class,'update'])->name('class.update');
Route::get('/class/delete/{id}', [ClassController::class,'destroy'])->name('class.delete');
});

/* Manage Teachers Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/teachers/view', [TeachersController::class,'view'])->name('teachers.view');
Route::get('/teachers/add', [TeachersController::class,'add'])->name('teachers.add');
Route::post('/teachers/store', [TeachersController::class,'store'])->name('teachers.store');
Route::get('/teachers/edit/{id}', [TeachersController::class,'edit'])->name('teachers.edit');
Route::post('/teachers/update/{id}', [TeachersController::class,'update'])->name('teachers.update');
Route::get('/teachers/delete/{id}', [TeachersController::class,'destroy'])->name('teachers.delete');
});
/* Manage Students Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/students/view', [StudentsController::class,'view'])->name('students.view');
Route::get('/students/add', [StudentsController::class,'add'])->name('students.add');
Route::post('/students/store', [StudentsController::class,'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentsController::class,'edit'])->name('students.edit');
Route::post('/students/update/{id}', [StudentsController::class,'update'])->name('students.update');
Route::get('/students/delete/{id}', [StudentsController::class,'destroy'])->name('students.delete');
});




require __DIR__.'/auth.php';