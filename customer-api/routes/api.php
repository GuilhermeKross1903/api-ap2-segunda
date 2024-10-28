<?php

use App\Http\Controllers\Produto;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/vendedor', [VendedorController::class, 'index']);
Route::get('/vendedor/{id}', [VendedorController::class, 'show']);
Route::post('/vendedor', [VendedorController::class, 'store']);
Route::put('/vendedor/{id}', [VendedorController::class, 'update']);
Route::delete('/vendedor/{id}', [VendedorController::class, 'destroy']);

Route::get('/produtos', [Produto::class, 'index']);
Route::get('/produtos/{id}', [Produto::class, 'show']);
Route::post('/produtos', [Produto::class, 'store']);
Route::put('/produtos/{id}', [Produto::class, 'update']);
Route::delete('/produtos/{id}', [Produto::class, 'destroy']);

