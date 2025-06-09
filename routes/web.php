<?php

use App\Http\Controllers\categoriasController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\imgagencontroller;
use App\Http\Controllers\CiudadController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', [categoriasController::class,'cualquiera']);

Route::get('/principal/create', [categoriasController::class,'create']);

Route::get('/principal/{cat}/{sub_cat}', [categoriasController::class,'alte']);

Route::get('/principal/{juego}/{nivel?}', function ($juego, $nivel = null) {
    if ($nivel == null){
        return "Sea bienvenido al deporte: ".$juego;
    } else{
        return "Sea bienvenido al deporte: ".$juego.", de nivel = ".$nivel;
    }
});


Route::resource('ciudades', CiudadController::class)->parameters([
    'ciudades' => 'ciudad'
]);

Route::get('/paises/crear', [CiudadController::class, 'crearPais'])->name('ciudades.create2');
Route::post('/paises/guardar', [CiudadController::class, 'guardarPais'])->name('ciudades.store2');

Route::get('ciudades/{ciudad}/imagen', [CiudadController::class, 'formAgregarImagen'])->name('ciudades.imagen.form');
Route::post('ciudades/{ciudad}/imagen', [CiudadController::class, 'guardarImagen'])->name('ciudades.imagen.guardar');




