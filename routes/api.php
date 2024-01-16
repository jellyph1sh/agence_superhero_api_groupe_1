<?php

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
Route::get("/users/delete/{id}", [UsersController::class, 'destroy']);
Route::post("/users/add", [UsersController::class, 'store']);
Route::put('users/update/{id}', [UsersController::class, 'update']);
Route::get(superHero, [SuperHeroController::class, 'show']);
Route::post("/superHero/", [SuperHeroController::class,'store']);
Route::put(superHero, [SuperHeroController::class, 'update']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

