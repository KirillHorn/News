<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('register', [AuthController::class, 'registration_view']);
Route::get('auth', [AuthController::class, 'auth_view']);
Route::post('registration_valid', [AuthController::class, 'registration_valid']);
Route::post('auth_valid', [AuthController::class, 'auth_valid']);
Route::get('/{id}/news', [MainController::class, 'news']);
Route::get('signout', [AuthController::class, 'signout']);

Route::middleware('CheckRole:Пользователь')->group(function () {

Route::get('/{id}/like_add', [MainController::class, 'like_add']);
Route::post('/{id}/commentAdd', [MainController::class, 'commentAdd']);
Route::get('/personalcub', [MainController::class, 'personalcub']);
Route::post('/addUsers', [MainController::class, 'addUsers']);

});

Route::middleware('CheckRole:Администратор')->group(function () {

Route::get('/admin/index', [NewsController::class, 'index']);
Route::get('/admin/addNews', [NewsController::class, 'addNews']);
Route::post('/addNews_validate', [NewsController::class, 'addNews_validate']);
Route::get('/admin/{id}/editingNews', [NewsController::class, 'editingNews']);
Route::post('/{id}/editingNews_validate', [NewsController::class, 'editingNews_validate']);
Route::get('/admin/{id}/locUnNew', [NewsController::class, 'locUnNew']);
Route::get('/admin/{id}/deleteNew', [NewsController::class, 'deleteNew']);
Route::get('/admin/usersAll', [NewsController::class, 'usersAll']);
Route::get('/admin/{id}/locUnUser', [NewsController::class, 'locUnUser']);

});
