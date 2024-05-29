<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');

Route::get('/users/create', [UserController::class, 'listByID'])->name('routeListByID');

Route::get('/users/id', [UserController::class, 'createUser'])->name('routeCreateUser');

Route::get('/users/id/edit', [UserController::class, 'editUser'])->name('routeEditUser');

Route::get('/users/id/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');