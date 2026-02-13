<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TagController;



/********** RUTAS DE PRUEBA **********/
Route::get('categories',           [CategoryController::class, 'index']);
Route::get('categories/{category}',[CategoryController::class, 'show']);

Route::get('tickets',         [TicketController::class, 'index']);
Route::get('tickets/{ticket}',[TicketController::class, 'show']);

Route::get('tags',        [TagController::class, 'index']);
Route::get('tags/{tag}',  [TagController::class, 'show']);