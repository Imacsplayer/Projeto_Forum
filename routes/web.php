<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');
Route::get('/users/create', [UserController::class, 'createUser'])->name('routeCreateUser');
Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('routeListUser');
Route::get('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
Route::get('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');

Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser'])->name('routeLogin');