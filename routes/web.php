<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index']);

Route::get('register', [AuthController::class, 'registration_view']);
Route::get('auth', [AuthController::class, 'auth_view']);
Route::post('registration_valid', [AuthController::class, 'registration_valid']);
Route::post('auth_valid', [AuthController::class, 'auth_valid']);
Route::get('signout', [AuthController::class, 'signout']);

