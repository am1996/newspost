<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [MainController::class,"index"])->name("posts.index");
Route::get('/login',        [MainController::class,"login"])->name("user.login");
Route::post('/login',       [MainController::class,"loginUser"])->name("user.loginPost");
Route::get('/logout',        [MainController::class,"logout"])->name("user.logout");
Route::get('/register',     [MainController::class,"register"])->name("user.register");
Route::post('/register',    [MainController::class,"registerUser"])->name("user.register");
