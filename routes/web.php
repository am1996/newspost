<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//
Route::get('/',             [PostController::class,"index"])->name("index");
Route::get("/posts",        [PostController::class,"posts"])->name("posts.index");
Route::get("/posts/add",    [PostController::class,"addPost"])->name("posts.add");

// Users
Route::get('/login',        [UserController::class,"login"])->name("user.login");
Route::post('/login',       [UserController::class,"loginUser"])->name("user.loginPost");
Route::get('/logout',       [UserController::class,"logout"])->name("user.logout");
Route::get('/register',     [UserController::class,"register"])->name("user.register");
Route::post('/register',    [UserController::class,"registerUser"])->name("user.register");
Route::get('/user',         [UserController::class,"dashboard"])->name("user.edit");
Route::post('/user',        [UserController::class,"edit"])->name("user.editPost");
