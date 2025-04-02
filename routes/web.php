<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pelicula', function () {
    return view('pelicula');
});

Route::get('/suma', function () {
    return view('suma');
});

Route::post('/suma', function () {
    $a = request('numero1');
    $b = request('numero2');
    $suma = $a + $b;
    return view('suma', ['suma' => $suma]);
});



