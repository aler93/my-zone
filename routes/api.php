<?php

use App\Http\Controllers\ApartamentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/login", [AuthController::class, "login"]);
Route::post("/logout", [AuthController::class, "logout"]);

Route::prefix("/apartaments")->group(function(){
    Route::get("/", [ApartamentController::class, "list"]);
    Route::get("/{id}", [ApartamentController::class, "show"]);
    Route::post("/", [ApartamentController::class, "store"]);
    Route::put("/{id}", [ApartamentController::class, "update"]);
    Route::delete("/{id}", [ApartamentController::class, "destroy"]);

    Route::middleware("checkToken")->group(function(){
        Route::post("/rate", [ApartamentController::class, "rate"]);
    });
});

Route::prefix("/categories")->group(function(){
    Route::get("/", [CategoryController::class, "list"]);
    Route::post("/", [CategoryController::class, "store"]);
    Route::patch("/{id}", [CategoryController::class, "update"]);
    Route::delete("/{id}", [CategoryController::class, "destroy"]);
});

Route::middleware("checkToken")->group(function(){
    Route::post("/subscribe", [UserSubscriptionController::class, "store"]);
});
