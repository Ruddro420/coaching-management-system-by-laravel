<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\FeesController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\ResultController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('/students/admission', [StudentsController::class, 'admissionStore']);
Route::get('/students/admission/{studentId}', [StudentsController::class, 'getAdmissionData']);

// fee collection
Route::post('/students/fee', [FeesController::class, 'addFees']);
Route::get('/getStudent/fee/{roll}/{month?}', [FeesController::class, 'getFees']);

//class api
Route::get('/getClass', [ClassController::class, 'getClassApi']);

// result api

Route::get('/getResult', [ResultController::class, 'getResults']);

// exam marks api
Route::get('/getExamResult', [ResultController::class, 'getResults']);