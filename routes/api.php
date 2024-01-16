<?php

use App\Http\Controllers\gadgetController;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

