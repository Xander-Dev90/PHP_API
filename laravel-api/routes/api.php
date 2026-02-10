<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TagController;



/********** RUTAS DE PRUEBA **********/
Route::get('categories',           [CategoryController::class, 'index']);
Route::get('categories/{category}',[CategoryController::class, 'show']);

Route::get('tickets',         [TicketController::class, 'index']);
Route::get('tickets/{ticket}',[TicketController::class, 'show']);

Route::get('tags',        [TagController::class, 'index']);
Route::get('tags/{tag}',  [TagController::class, 'show']);