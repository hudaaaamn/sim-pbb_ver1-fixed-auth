<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\LspopController;
use App\Http\Controllers\PelayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpopController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'apiLogin']);
Route::middleware('auth:sanctum')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardDataController::class, 'index']);
    Route::post('/dashboard', [DashboardDataController::class, 'store']);
    // Spop
    Route::post('/spop', [SpopController::class, 'apiStore']);
    Route::get('/spop/{nop}', [SpopController::class, 'apiShow']);
    // Lspop
    Route::post('/lspop', [LspopController::class, 'apiStore']);
    Route::get('/lspop/{nop}', [LspopController::class, 'apiShow']);
    // Pelayanan
    Route::post('/pelayanan', [PelayananController::class, 'apiStore']);
    Route::get('/pelayanan', [PelayananController::class, 'apiIndex']);
    Route::get('/pelayanan/{id}', [PelayananController::class, 'apiShow']);
    Route::patch('/pelayanan/{id}', [PelayananController::class, 'apiUpdate']);
    Route::delete('/pelayanan/{id}', [PelayananController::class, 'apiDestroy']);
    // User
    Route::get('/user', [UserController::class, 'apiIndex']);
    Route::get('/user/{id}', [UserController::class, 'apiShow']);
    Route::post('/user', [UserController::class, 'apiStore']);
    Route::delete('/user/{id}', [UserController::class, 'apiDestroy']);
    Route::patch('/user/{id}', [UserController::class, 'apiUpdate']);
});