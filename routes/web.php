<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::match(
    ['get', 'post'], 
    '/login', 
    [AuthController::class, 'loginUser']
)->name('routeLogin');

Route::get('/logout',
    [AuthController::class, 'logoutUser']
)->name('routeLogout');

Route::match(
    ['get', 'post'], 
    '/register', 
    [UserController::class, 'registerUser']
)->name('routeRegisterUser');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('routeListUser');
    Route::get('/users/{uid}/edit', [UserController::class,'editUser'])->name('routeEditUser');
    Route::get('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
});