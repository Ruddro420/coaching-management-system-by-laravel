<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StudentsController;

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

Route::prefix('api')->group(function () {
    Route::post('/students', [StudentsController::class, 'store']); // Save student data
/*     Route::get('/students', [StudentController::class, 'index']); // Fetch all students
    Route::get('/students/{id}', [StudentController::class, 'show']); // Fetch a single student
    Route::post('/students/{id}/invoice', [StudentController::class, 'generateInvoice']); // Generate PDF invoice */
});
