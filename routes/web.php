<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

// -------------------------------------- Rotas para LOGIN/REGISTRAR e a autenticação das rotas --------------------------------------
Route::get(
    '/',
    [Controller::class, 'welcome']
)->name('welcome');

Route::match(
    ['get', 'post'],
    '/login',
    [AuthController::class, 'login']
)->name('routeLogin');

Route::match(
    ['get', 'post'],
    '/register',
    [UserController::class, 'register']
)->name('routeRegister');

Route::get(
    '/logout',
    [AuthController::class, 'logout']
)->name('routeLogout');

Route::get(
    '/posts',
    [PostController::class, 'listAllPosts']
)->name('routeListAllPosts');

Route::middleware('auth')->group(function () {

    // -------------------------------------- Parte para USUÁRIOS -------------------------------------------
    Route::get(
        '/users',
        [UserController::class, 'listAllUsers']
    )->name('routeListAllUsers');

    Route::get(
        '/users/{id}',
        [UserController::class, 'listUserById']
    )->name('routeListUserById');

    Route::match(
        ['get','post'],
        '/users/{id}/update',
        [UserController::class, 'updateUser']
    )->name('routeUpdateUser');

    Route::delete(
        '/users/{id}/delete',
        [UserController::class, 'deleteUser']
    )->name('routeDeleteUser');


    // -------------------------------------- Parte para POSTS --------------------------------------
    Route::get(
        '/posts/{id}',
        [PostController::class, 'listPostById']
    )->name('routeListPostById');

    Route::put(
        '/posts/{id}/update',
        [PostController::class, 'updatePost']
    )->name('routeUpdatePost');

    Route::delete(
        '/posts/{id}/delete',
        [PostController::class, 'deletePost']
    )->name('routeDeletePost');

    Route::match(
        ['get', 'post'],
        '/createPost',
        [PostController::class, 'createPost']
    )->name('routeCreatePost');


    // -------------------------------------- Parte para TÓPICOS --------------------------------------
    Route::get(
        '/topics',
        [TopicController::class, 'listAllTopics']
    )->name('routeListAllTopics');

    Route::get(
        '/topics/{id}',
        [TopicController::class, 'listTopicById']
    )->name('routeListTopicById');

    Route::put(
        '/topics/{id}/update',
        [TopicController::class, 'updateTopic']
    )->name('routeUpdateTopic');

    Route::delete(
        '/topics/{id}/delete',
        [TopicController::class, 'deleteTopic']
    )->name('routeDeleteTopic');

    Route::match(
        ['get', 'post'],
        '/createTopic',
        [TopicController::class, 'createTopic']
    )->name('routeCreateTopic');


    // -------------------------------------- Parte para TAGS --------------------------------------
    Route::get(
        '/tags',
        [TagController::class, 'listAllTags']
    )->name('routeListAllTags');

    Route::get(
        '/tags/{id}',
        [TagController::class, 'listTagById']
    )->name('routeListTagById');

    Route::put(
        '/tags/{id}/update',
        [TagController::class, 'updateTag']
    )->name('routeUpdateTag');

    Route::delete(
        '/tags/{id}/delete',
        [TagController::class, 'deleteTag']
    )->name('routeDeleteTag');

    Route::match(
        ['get', 'post'],
        '/createTag',
        [TagController::class, 'createTag']
    )->name('routeCreateTag');


    // -------------------------------------- Parte para CATEGORIAS --------------------------------------
    Route::get(
        '/categories',
        [CategoryController::class, 'listAllCategories']
    )->name('routeListAllCategories');

    Route::get(
        '/categories/{id}',
        [CategoryController::class, 'listCategoryById']
    )->name('routeListCategoryById');

    Route::put(
        '/categories/{id}/update',
        [CategoryController::class, 'updateCategory']
    )->name('routeUpdateCategory');

    Route::delete(
        '/categories/{id}/delete',
        [CategoryController::class, 'deleteCategory']
    )->name('routeDeleteCategory');

    Route::match(
        ['get', 'post'],
        '/createCategory',
        [CategoryController::class, 'createCategory']
    )->name('routeCreateCategory');
});
