<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TeachersController;

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

/* Manage Teachers Here ######### */

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/teachers/view', [TeachersController::class,'view'])->name('teachers.view');
    Route::get('/teachers/add', [TeachersController::class,'add'])->name('teachers.add');
    Route::post('/teachers/store', [TeachersController::class,'store'])->name('teachers.store');
    Route::get('/teachers/edit/{id}', [TeachersController::class,'edit'])->name('teachers.edit');
    Route::post('/teachers/update/{id}', [TeachersController::class,'update'])->name('teachers.update');
    Route::get('/teachers/delete/{id}', [TeachersController::class,'destroy'])->name('teachers.delete');
    });




require __DIR__.'/auth.php';