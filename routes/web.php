<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

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

Route::resource('/doctor', DoctorController::class);
Route::resource('/home', HomeController::class);
Route::post('/get_drs', [AppointmentController::class, 'get_drs'])->name('get_drs');
Route::post('/get_dr_fee', [AppointmentController::class, 'get_dr_fee'])->name('get_dr_fee');
Route::resource('/appointment', AppointmentController::class);
Route::get('/', [HomeController::class,'index']);
