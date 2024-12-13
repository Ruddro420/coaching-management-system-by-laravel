<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TeachersController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\StuffController;
use App\Http\Controllers\admin\FeesController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('pages/admin/dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

/* Manage Dashboard Here ######### */
Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

/* Manage Class Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/class/view', [ClassController::class,'view'])->name('class.view');
Route::get('/class/add', [ClassController::class,'add'])->name('class.add');
Route::post('/class/store', [ClassController::class,'store'])->name('class.store');
Route::get('/class/edit/{id}', [ClassController::class,'edit'])->name('class.edit');
Route::post('/class/update/{id}', [ClassController::class,'update'])->name('class.update');
Route::get('/class/delete/{id}', [ClassController::class,'destroy'])->name('class.delete');
});
/* Manage Course Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/course/view', [CourseController::class,'view'])->name('course.view');
Route::get('/course/add', [CourseController::class,'add'])->name('course.add');
Route::post('/course/store', [CourseController::class,'store'])->name('course.store');
Route::get('/course/edit/{id}', [CourseController::class,'edit'])->name('course.edit');
Route::post('/course/update/{id}', [CourseController::class,'update'])->name('course.update');
Route::get('/course/delete/{id}', [CourseController::class,'destroy'])->name('course.delete');
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
/* Manage Stuff Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/stuff/view', [StuffController::class,'view'])->name('stuff.view');
Route::get('/stuff/add', [StuffController::class,'add'])->name('stuff.add');
Route::post('/stuff/store', [StuffController::class,'store'])->name('stuff.store');
Route::get('/stuff/edit/{id}', [StuffController::class,'edit'])->name('stuff.edit');
Route::post('/stuff/update/{id}', [StuffController::class,'update'])->name('stuff.update');
Route::get('/stuff/delete/{id}', [StuffController::class,'destroy'])->name('stuff.delete');
});
/* Manage Fees Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
Route::get('/fees/view', [FeesController::class,'view'])->name('fees.view');
Route::get('/fees/add', [FeesController::class,'add'])->name('fees.add');
Route::post('/fees/store', [FeesController::class,'store'])->name('fees.store');
Route::get('/fees/edit/{id}', [FeesController::class,'edit'])->name('fees.edit');
Route::post('/fees/update/{id}', [FeesController::class,'update'])->name('fees.update');
Route::get('/fees/delete/{id}', [FeesController::class,'destroy'])->name('fees.delete');
/* Fees Invoice */
Route::get('/invoice/search', [FeesController::class,'invoiceSearch'])->name('invoice.search');
Route::post('/invoice/search', [FeesController::class,'invoiceSearch'])->name('invoice.search');
});
/* Manage Result Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/result/view', [ResultController::class,'view'])->name('result.view');
    Route::get('/result/add', [ResultController::class,'add'])->name('result.add');
    Route::post('/result/store', [ResultController::class,'store'])->name('result.store');
    Route::get('/result/edit/{id}', [ResultController::class,'edit'])->name('result.edit');
    Route::post('/result/update/{id}', [ResultController::class,'update'])->name('result.update');
    Route::get('/result/delete/{id}', [ResultController::class,'destroy'])->name('result.delete');
    });
/* Manage expense and result Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/expense/view', [ExpenseController::class,'view'])->name('expense.view');
/*     Route::get('/result/add', [ResultController::class,'add'])->name('result.add');
    Route::post('/result/store', [ResultController::class,'store'])->name('result.store');
    Route::get('/result/edit/{id}', [ResultController::class,'edit'])->name('result.edit');
    Route::post('/result/update/{id}', [ResultController::class,'update'])->name('result.update');
    Route::get('/result/delete/{id}', [ResultController::class,'destroy'])->name('result.delete'); */
    });




require __DIR__.'/auth.php';