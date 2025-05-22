<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MascotaController;
use App\Http\Middleware\IsUserAdmin;
use App\Http\Middleware\IsAuthenticated;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/registro', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'inicioSesion']);



Route::middleware([IsUserAdmin::class])->group(function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/users/{id}/pets', [MascotaController::class, 'showByUser']);
});

Route::middleware([IsAuthenticated::class])->group(function(){
    Route::get('/pets', [MascotaController::class, 'index']);
    Route::post('/pets', [MascotaController::class, 'store']);
    Route::put('/pets/{id}', [MascotaController::class, 'update']);
    Route::patch('/pets/{id}', [MascotaController::class, 'patch']);
    Route::delete('/pets/{id}', [MascotaController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);

});

