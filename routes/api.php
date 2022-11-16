<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/doctor', [DoctorController::class, 'show'])->middleware('auth:sanctum');

Route::put('/doctor', [DoctorController::class, 'edit'])->middleware('auth:sanctum');

Route::get('/patients', [PatientController::class, 'index'])->middleware('auth:sanctum');

Route::post('/patients', [PatientController::class, 'store'])->middleware('auth:sanctum');

Route::put('/patients', [PatientController::class, 'edit'])->middleware('auth:sanctum');

Route::delete('/patients', [PatientController::class, 'destroy'])->middleware('auth:sanctum');