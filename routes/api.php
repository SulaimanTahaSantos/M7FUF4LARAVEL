<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', function(Request $request){
    return "Creando estudiante: ";
});
Route::put('/students/{id}', function($id, Request $request){
    return "Actualizando estudiante con ID: $id";
});
// hazme el ptch
Route::patch('/students/{id}', function($id, Request $request){
    return "Actualizando parcialmente estudiante con ID: $id";
});
Route::delete('/students/{id}', function($id){
    return "Eliminando estudiante con ID: $id";
});
Route::get('/students/{id}/courses', function($id){
    return "Lista de cursos del estudiante con ID: $id";
});
