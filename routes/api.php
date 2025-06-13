<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\UserPetsController;

// Auth routes
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [AuthController::class, 'profile']);
    });
});

// Peoples routes
Route::prefix('peoples')->group(function () {
    Route::get('{id}', [PeoplesController::class, 'show']);
    Route::get('/', [PeoplesController::class, 'all']);
    Route::middleware('api')->group(function () {
        Route::post('/', [PeoplesController::class, 'store']);
        Route::post('{id}', [PeoplesController::class, 'update']);
        Route::delete('{id}', [PeoplesController::class, 'destroy']);
    });
});

// Pets routes
Route::prefix('pets')->group(function () {
    Route::get('{id}', [PetsController::class, 'show']);
    Route::get('/', [PetsController::class, 'all']);
    Route::middleware('api')->group(function () {
        Route::post('/', [PetsController::class, 'create']);
        Route::post('{id}', [PetsController::class, 'update']);
        Route::delete('{id}', [PetsController::class, 'destroy']);
    });
});

// UserPets routes
Route::get('getPetsByPeople/{id}', [UserPetsController::class, 'getPetsByPeopleId']);
