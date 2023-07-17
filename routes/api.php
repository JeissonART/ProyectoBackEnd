<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactosController;
use App\Http\Controllers\Api\UsuarioController;

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

//APIS Contactos//
Route::get('/contactosR',[ContactosController::class,'read']);
Route::post('/contactosC',[ContactosController::class,'create']);

//APIS Usuario//
Route::get('/userR',[UsuarioController::class,'read']);
Route::post('/userC',[UsuarioController::class,'create']);
Route::put('/userU',[UsuarioController::class,'update']);
Route::delete('/userD',[UsuarioController::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
