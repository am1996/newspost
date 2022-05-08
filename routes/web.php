<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Index
Route::get('/',             [PostController::class,"index"])->name("index");
Route::get('/login',        [UserController::class,"login"])->name("index.login");
Route::post('/login',       [UserController::class,"loginUser"]);
Route::get('/logout',       [UserController::class,"logout"])->name("index.logout");
Route::get('/register',     [UserController::class,"register"])->name("index.register");
Route::post('/register',    [UserController::class,"registerUser"]);

// Posts
Route::group(["prefix"=>"posts"],function(){
    Route::get("/",        [PostController::class,"posts"])->name("posts.index");
    Route::get("/add",    [PostController::class,  "add"])->name("posts.add");
    Route::post("/add",   [PostController::class,"add"]);
    Route::get("/{id}",   [PostController::class,"view"])->name("posts.view");
    Route::get("/{id}/edit",    [PostController::class, "edit"])->name("posts.edit");
    Route::post("/{id}/edit",    [PostController::class, "edit"]);
    Route::post("/{id}/delete",    [PostController::class, "delete"]);
});

//User
Route::group(["prefix"=>"user"],function(){
    Route::get('/', [UserController::class,"dashboard"])->name("user.edit");
    Route::post('/',[UserController::class,"edit"])->name("user.editPost");
});
