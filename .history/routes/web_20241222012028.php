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
use App\Http\Controllers\ExamController;

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
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth','role:admin','verified'])->name('dashboard');

/* Manage Class Here ######### */
/* Route::prefix('dashboard')->middleware(['auth', 'role:result'])->group(function () {
    Route::get('/class/view', [ClassController::class, 'view'])->name('class.view');
    Route::get('/class/add', [ClassController::class, 'add'])->name('class.add');
    Route::post('/class/store', [ClassController::class, 'store'])->name('class.store');
    Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
    Route::post('/class/update/{id}', [ClassController::class, 'update'])->name('class.update');
    Route::get('/class/delete/{id}', [ClassController::class, 'destroy'])->name('class.delete');
}); */


// Apply 'auth' middleware to all routes, and the role middleware for specific roles
Route::middleware(['auth', 'role:result'])->group(function () {
    // Route to view the class list
    Route::get('/dashboard/class/view', [ClassController::class, 'view'])->name('class.view');

    // Route to add a new class
    Route::get('/dashboard/class/add', [ClassController::class, 'add'])->name('class.add');

    // Route to store a new class
    Route::post('/dashboard/class/store', [ClassController::class, 'store'])->name('class.store');

    // Route to edit an existing class
    Route::get('/dashboard/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');

    // Route to update an existing class
    Route::post('/dashboard/class/update/{id}', [ClassController::class, 'update'])->name('class.update');

    // Route to delete a class
    Route::get('/dashboard/class/delete/{id}', [ClassController::class, 'destroy'])->name('class.delete');
});




/* Manage Course Here ######### */
Route::middleware(['auth', 'role:result'])->group(function () {
    Route::get('/dashboard/course/view', [CourseController::class, 'view'])->name('course.view');
    Route::get('/dashboard/course/add', [CourseController::class, 'add'])->name('course.add');
    Route::post('/dashboard/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/dashboard/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/dashboard/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/dashboard/course/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');
});

/* Manage Teachers Here ######### */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/teachers/view', [TeachersController::class, 'view'])->name('teachers.view');
    Route::get('/dashboard/teachers/add', [TeachersController::class, 'add'])->name('teachers.add');
    Route::post('/dashboard/teachers/store', [TeachersController::class, 'store'])->name('teachers.store');
    Route::get('/dashboard/teachers/edit/{id}', [TeachersController::class, 'edit'])->name('teachers.edit');
    Route::post('/dashboard/teachers/update/{id}', [TeachersController::class, 'update'])->name('teachers.update');
    Route::get('/dashboard/teachers/delete/{id}', [TeachersController::class, 'destroy'])->name('teachers.delete');
});
/* Manage Students Here ######### */
Route::middleware(['auth', 'role:result,fee_collection,admission'])->group(function () {
    Route::get('/dashboard/students/view', [StudentsController::class, 'view'])->name('students.view');
    Route::get('/dashboard/students/add', [StudentsController::class, 'add'])->name('students.add');
    Route::post('/dashboard/students/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/dashboard/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    Route::post('/dashboard/students/update/{id}', [StudentsController::class, 'update'])->name('students.update');
    Route::get('/dashboard/students/delete/{id}', [StudentsController::class, 'destroy'])->name('students.delete');
});
/* Manage Stuff Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/dashboard/stuff/view', [StuffController::class, 'view'])->name('stuff.view');
    Route::get('/dashboard/stuff/add', [StuffController::class, 'add'])->name('stuff.add');
    Route::post('/dashboard/stuff/store', [StuffController::class, 'store'])->name('stuff.store');
    Route::get('/dashboard/stuff/edit/{id}', [StuffController::class, 'edit'])->name('stuff.edit');
    Route::post('/dashboard/stuff/update/{id}', [StuffController::class, 'update'])->name('stuff.update');
    Route::get('/dashboard/stuff/delete/{id}', [StuffController::class, 'destroy'])->name('stuff.delete');
});
/* Manage Fees Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/fees/view', [FeesController::class, 'view'])->name('fees.view');
    Route::get('/fees/add', [FeesController::class, 'add'])->name('fees.add');
    Route::post('/fees/store', [FeesController::class, 'store'])->name('fees.store');
    Route::get('/fees/edit/{id}', [FeesController::class, 'edit'])->name('fees.edit');
    Route::post('/fees/update/{id}', [FeesController::class, 'update'])->name('fees.update');
    Route::get('/fees/delete/{id}', [FeesController::class, 'destroy'])->name('fees.delete');
    /* Fees Invoice */
    Route::get('/invoice/search', [FeesController::class, 'invoiceSearch'])->name('invoice.search');
    Route::post('/invoice/search', [FeesController::class, 'invoiceSearch'])->name('invoice.search');
});
/* Manage Result Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/result/view', [ResultController::class, 'view'])->name('result.view');
    Route::get('/result/add', [ResultController::class, 'add'])->name('result.add');
    Route::post('/result/store', [ResultController::class, 'store'])->name('result.store');
    Route::get('/result/edit/{id}', [ResultController::class, 'edit'])->name('result.edit');
    Route::post('/result/update/{id}', [ResultController::class, 'update'])->name('result.update');
    Route::get('/result/delete/{id}', [ResultController::class, 'destroy'])->name('result.delete');
});
/* Manage expense and result Here ######### */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/expense/view', [ExpenseController::class, 'view'])->name('expense.view');
    Route::get('/expense/add', [ExpenseController::class, 'add'])->name('expense.add');
    Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.delete');
});
/* Manage exam and result ######### */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/exam/view', [ExamController::class, 'view'])->name('exam.view');
    Route::get('/exam/add', [ExamController::class, 'add'])->name('exam.add');
    Route::post('/exam/store', [ExamController::class, 'store'])->name('exam.store');
    Route::get('/exam/delete/{id}', [ExamController::class, 'destroy'])->name('exam.delete');

    // result add
    Route::get('/exam/result/view', [ExamController::class, 'examResultView'])->name('exam.result.add');
    Route::post('/submit-result', [ExamController::class, 'submitResult'])->name('submit.result');
});




require __DIR__ . '/auth.php';
