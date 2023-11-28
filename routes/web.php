<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/patient', [PatientController::class, 'index']);

Route::post('/patient', [PatientController::class, 'store']);

Route::put('/patient', [PatientController::class, 'edit']);

Route::delete('/patient', [PatientController::class, 'destroy']);

Route::get('/doctor', [DoctorController::class, 'index']);

Route::put('/doctor', [DoctorController::class, 'edit']);

Route::get('/appointment', [AppointmentController::class, 'index']);

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::put('/appointment', [AppointmentController::class, 'edit']);

Route::delete('/appointment', [AppointmentController::class, 'destroy']);