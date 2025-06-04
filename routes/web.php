<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LenguajesDeProgramacionController;
use App\Http\Controllers\TitanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books',BookController::class);
Route::resource('lenguajesdeprogramacion', LenguajesDeProgramacionController::class);
Route::resource('titanes', TitanController::class);
