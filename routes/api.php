<?php

use App\Http\Controllers\citiesController;
use App\Http\Controllers\gadgetController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuperHeroController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
const superHero = "/superHero/{id}";
Route::apiResource("users", UsersController::class);
Route::get("/users/{id}", [UsersController::class, 'show']);
Route::post("/users/delete/{id}", [UsersController::class, 'destroy']);
Route::post("/users/add", [UsersController::class, 'store']);
Route::put('users/update/{id}', [UsersController::class, 'update']);
Route::get("/superHero/", [SuperHeroController::class, 'index']);
Route::post("/superHero", [SuperHeroController::class,'store']);
Route::get(superHero, [SuperHeroController::class, 'show']);
Route::put(superHero, [SuperHeroController::class, 'update']);
Route::delete("/superHero/delete/{id}", [SuperHeroController::class, 'destroy']);
Route::put("/gadget/{id}", [gadgetController::class, 'update']);
Route::post("/gadget", [gadgetController::class,'store']);
Route::delete("/gadget/delete/{id}", [gadgetController::class, 'destroy']);
Route::get("/vehicule/{id}", [VehiculeController::class, 'show']);
Route::get("/vehicule", [VehiculeController::class, 'index']);
Route::put("/vehicule/{id}", [VehiculeController::class, 'updtade']);
Route::delete("/vehicule/delete/{id}", [VehiculeController::class, 'destroy']);
Route::post("/vehicule", [VehiculeController::class, 'store']);
Route::get("/city/{id}", [gadgetController::class, 'show']);
Route::get("/city", [citiesController::class, 'index']);
Route::put("/city/{id}", [citiesController::class, 'updtade']);
Route::delete("/city/delete/{id}", [citiesController::class, 'destroy']);
Route::post("/city", [citiesController::class, 'store']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

