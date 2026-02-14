<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TagController;



/********** RUTAS DE PRUEBA **********/
Route::apiResource('categories', CategoryController::class);

Route::apiResource('tickets', TicketController::class);

Route::apiResource('tags', TagController::class);
