<?php

use App\Http\Controllers\ApartamentController;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("/apartaments")->group(function(){
    Route::get("/", [ApartamentController::class, "list"]);
    Route::get("/{id}", [ApartamentController::class, "show"]);
    Route::post("/", [ApartamentController::class, "store"]);
    Route::put("/{id}", [ApartamentController::class, "update"]);
    Route::delete("/{id}", [ApartamentController::class, "destroy"]);
});

Route::prefix("/categories")->group(function(){
    Route::get("/", [CategoryController::class, "list"]);
    Route::post("/", [CategoryController::class, "store"]);
    Route::patch("/{id}", [CategoryController::class, "update"]);
    Route::delete("/{id}", [CategoryController::class, "destroy"]);
});
