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

Route::post('/logout',
    [AuthController::class, 'logoutUser']
)->name('routeLogout');

Route::match(
    ['get', 'post'], 
    '/register', 
    [UserController::class, 'registerUser']
)->name('routeRegisterUser');

Route::get('/', [UserController::class, 'welcomeUser'])->name('routeWelcomeUser');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('routeListUser');
    Route::put('/users/{uid}/update', [UserController::class, 'updateUser'])->name('routeUpdateUser');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
});